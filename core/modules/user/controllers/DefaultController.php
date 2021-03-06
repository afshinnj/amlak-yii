<?php

namespace app\modules\user\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;

use yii\web\UploadedFile;
use app\modules\user\models\Profile;
use app\modules\dashboard\models\Pages;
/**
 * Default controller for User module
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'confirm', 'resend'],
                        'allow'   => true,
                        'roles'   => ['?', '@'],
                    ],
                    [
                        'actions' => ['account', 'profile', 'resend-change', 'cancel', 'logout','avatar','email'],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                    [
                        'actions' => ['login', 'register', 'forgot', 'reset'],
                        'allow'   => true,
                        'roles'   => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Display index - debug page, login page, or account page
     */
    public function actionIndex()
    {
        if (defined('YII_DEBUG') && YII_DEBUG) {
            $actions = Yii::$app->getModule("user")->getActions();
            return $this->render('index', ["actions" => $actions]);
        } elseif (Yii::$app->user->isGuest) {
            return $this->redirect(["/user/login"]);
        } else {
            return $this->redirect(["/user/account"]);
        }
    }

    /**
     * Display login page
     */
    public function actionLogin()
    {
        /** @var \app\modules\user\models\forms\LoginForm $model */

        // load post data and login
        $model = Yii::$app->getModule("user")->model("LoginForm");
        if ($model->load(Yii::$app->request->post()) && $model->login(Yii::$app->getModule("user")->loginDuration)) {
        	
        	isset($session['captcha']) ? $session['captcha'] = 0 : '';
        	
            return $this->goBack(Yii::$app->getModule("user")->loginRedirect);
        }else{
			if(Yii::$app->session['captcha'] >= 1){
				$count =  Yii::$app->session['captcha'];
				$page_captcha_count = Pages::findOne(['id' => 1])->captcha_count; 
				 $count != $page_captcha_count ? Yii::$app->session->set('captcha', $count = $count + 1 ) : '';			    	
				  
			}else{
				Yii::$app->session['captcha'] = 1;
			}
			
		}

        // render
        return $this->renderPartial('login', [
            'model' => $model,
        	'page' => Pages::find()->where(['id' =>1])->one(),
        ]);
    }

    /**
     * Log user out and redirect
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        // redirect
        $logoutRedirect = Yii::$app->getModule("user")->logoutRedirect;
        if ($logoutRedirect === null) {
            return $this->goHome();
        }
        else {
            return $this->redirect($logoutRedirect);
        }
    }

    /**
     * Display registration page
     */
    public function actionRegister()
    {
        /** @var \app\modules\user\models\User    $user */
        /** @var \app\modules\user\models\Profile $profile */
        /** @var \app\modules\user\models\Role    $role */

        // set up new user/profile objects
        $user    = Yii::$app->getModule("user")->model("User", ["scenario" => "register"]);
        $profile = Yii::$app->getModule("user")->model("Profile");

        // load post data
        $post = Yii::$app->request->post();
        if ($user->load($post)) {

            // ensure profile data gets loaded
            $profile->load($post);

            // validate for ajax request
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($user, $profile);
            }

            // validate for normal request
            if ($user->validate() && $profile->validate()) {

                // perform registration
                $role = Yii::$app->getModule("user")->model("Role");
                $user->setRegisterAttributes($role::ROLE_USER, Yii::$app->request->userIP)->save(false);
                $profile->setUser($user->id)->save(false);
                $this->afterRegister($user);

                // set flash
                // don't use $this->refresh() because user may automatically be logged in and get 403 forbidden
                $successText = Yii::t("user", "Successfully registered [ {displayName} ]", ["displayName" => $user->getDisplayName()]);
                $guestText = "";
                if (Yii::$app->user->isGuest) {
                    $guestText = Yii::t("user", " - Please check your email to confirm your account");
                }
                Yii::$app->session->setFlash("Register-success", $successText . $guestText);
            }
        }

        // render
        return $this->renderPartial("register", [
            'user'    => $user,
            'profile' => $profile,
        	'page' => Pages::find()->where(['id' =>2])->one(),
        ]);
    }

    /**
     * Process data after registration
     *
     * @param \app\modules\user\models\User $user
     */
    protected function afterRegister($user)
    {
        /** @var \app\modules\user\models\UserKey $userKey */

        // determine userKey type to see if we need to send email
        $userKey = Yii::$app->getModule("user")->model("UserKey");
        if ($user->status == $user::STATUS_INACTIVE) {
            $userKeyType = $userKey::TYPE_EMAIL_ACTIVATE;
        } elseif ($user->status == $user::STATUS_UNCONFIRMED_EMAIL) {
            $userKeyType = $userKey::TYPE_EMAIL_CHANGE;
        } else {
            $userKeyType = null;
        }

        // check if we have a userKey type to process, or just log user in directly
        if ($userKeyType) {

            // generate userKey and send email
            $userKey = $userKey::generate($user->id, $userKeyType);
            if (!$numSent = $user->sendEmailConfirmation($userKey)) {

                // handle email error
                //Yii::$app->session->setFlash("Email-error", "Failed to send email");
            }
        } else {
            Yii::$app->user->login($user, Yii::$app->getModule("user")->loginDuration);
        }
    }

    /**
     * Confirm email
     */
    public function actionConfirm($key)
    {
        /** @var \app\modules\user\models\UserKey $userKey */
        /** @var \app\modules\user\models\User $user */

        // search for userKey
        $success = false;
        $userKey = Yii::$app->getModule("user")->model("UserKey");
        $userKey = $userKey::findActiveByKey($key, [$userKey::TYPE_EMAIL_ACTIVATE, $userKey::TYPE_EMAIL_CHANGE]);
        if ($userKey) {

            // confirm user
            $user = Yii::$app->getModule("user")->model("User");
            $user = $user::findOne($userKey->user_id);
            $user->confirm();

            // consume userKey and set success
            $userKey->consume();
            $success = $user->email;
        }

        // render
        return $this->render("confirm", [
            "userKey" => $userKey,
            "success" => $success
        ]);
    }

    /**
     * Account
     */
    public function actionAccount()
    {
        /** @var \app\modules\user\models\User $user */
        /** @var \app\modules\user\models\UserKey $userKey */

        // set up user and load post data
        $user = Yii::$app->user->identity;
        $user->setScenario("account");
        $loadedPost = $user->load(Yii::$app->request->post());

        // validate for ajax request
        if ($loadedPost && Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($user);
        }

        // validate for normal request
        if ($loadedPost && $user->validate()) {

            // generate userKey and send email if user changed his email
            if (Yii::$app->getModule("user")->emailChangeConfirmation && $user->checkAndPrepEmailChange()) {

                $userKey = Yii::$app->getModule("user")->model("UserKey");
                $userKey = $userKey::generate($user->id, $userKey::TYPE_EMAIL_CHANGE);
                if (!$numSent = $user->sendEmailConfirmation($userKey)) {

                    // handle email error
                    //Yii::$app->session->setFlash("Email-error", "Failed to send email");
                }
            }

            // save, set flash, and refresh page
            $user->save(false);
            Yii::$app->session->setFlash("Account-success", Yii::t("user", "Account updated"));
            return $this->refresh();
        }

        // render
        return $this->render("account", [
            'user' => $user,
        ]);
    }

    /**
     * Profile
     */
    public function actionProfile()
    {
        /** @var \app\modules\user\models\Profile $profile */

        // set up profile and load post data
        $profile = Yii::$app->user->identity->profile;
        $loadedPost = $profile->load(Yii::$app->request->post());

        // validate for ajax request
        if ($loadedPost && Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($profile);
        }

        // validate for normal request
        if ($loadedPost && $profile->validate()) {
            $profile->save(false);
            Yii::$app->session->setFlash("Profile-success", Yii::t("user", "Profile updated"));
            return $this->refresh();
        }

        // render
        return $this->render("profile", [
            'profile' => $profile,
        ]);
    }

    public function actionAvatar() {
    	$dir_uploads = Yii::getAlias ( '@webroot' ) . '/uploads/';
    	if(!is_dir($dir_uploads)){
    		$result = mkdir($dir_uploads, 0755, true);
    	}
    	
    	$dir_avatar = Yii::getAlias ( '@webroot' ) . '/uploads/avatars/';
    	if(!is_dir($dir_avatar)){
    		$result = mkdir($dir_avatar, 0755, true);
    	}
    	
    	// set up user and load post data
    	$profile = Yii::$app->user->identity->profile;
    	$profile->setScenario ( "avatar" );
    	if (Yii::$app->request->isPost) {
    		$model = new Profile ();
    		$model->file = UploadedFile::getInstance ( $model, 'file' );
    		if ($model->validate ()) {
    			@unlink ( $dir_avatar . $profile->avatar );
    			$avatar = 'avatar(' . Yii::$app->user->identity->username . '-' . md5 ( $model->file->baseName . time () ) . ').' . $model->file->extension;
    			$model->file->saveAs ( 'uploads/avatars/' . $avatar );
    			$profile->avatar = $avatar;
    			$profile->save ( false );
    			Yii::$app->session->setFlash ( "Avatar-success", Yii::t ( "user", "Profile updated" ) );
    			return $this->refresh ();
    		}
    	}
    	// render
    	return $this->render ( "avatar", [
    			'user' => $profile
    	] );
    }
    
    public function actionEmail() {
    	/** @var \app\modules\user\models\User $user */
    	/** @var \app\modules\user\models\UserKey $userKey */
    	 
    	// set up user and load post data
    	$user = Yii::$app->user->identity;
    	//$user->setScenario("email");
    	$loadedPost = $user->load(Yii::$app->request->post());
    	 
    	// validate for ajax request
    	if ($loadedPost && Yii::$app->request->isAjax) {
    		Yii::$app->response->format = Response::FORMAT_JSON;
    		return ActiveForm::validate($user);
    	}
    	 
    	// validate for normal request
    	if ($loadedPost && $user->validate()) {
    		 
    		// generate userKey and send email if user changed his email
    		if (Yii::$app->getModule("user")->emailChangeConfirmation && $user->checkAndPrepEmailChange()) {
    			 
    			$userKey = Yii::$app->getModule("user")->model("UserKey");
    			$userKey = $userKey::generate($user->id, $userKey::TYPE_EMAIL_CHANGE);
    			if (!$numSent = $user->sendEmailConfirmation($userKey)) {
    				 
    				// handle email error
    				//Yii::$app->session->setFlash("Email-error", "Failed to send email");
    			}
    		}
    		 
    		// save, set flash, and refresh page
    		$user->save(false);
    		Yii::$app->session->setFlash("Account-success", Yii::t("user", "Account updated"));
    		return $this->refresh();
    	}
    	 
    	// render
    	return $this->render("email", [
    			'user' => $user,
    	]);
    
    }
    /**
     * Resend email confirmation
     */
    public function actionResend()
    {
        /** @var \app\modules\user\models\forms\ResendForm $model */

        // load post data and send email
        $model = Yii::$app->getModule("user")->model("ResendForm");
        if ($model->load(Yii::$app->request->post()) && $model->sendEmail()) {

            // set flash (which will show on the current page)
            Yii::$app->session->setFlash("Resend-success", Yii::t("user", "Confirmation email resent"));
        }

        // render
        return $this->render("resend", [
            "model" => $model,
        ]);
    }

    /**
     * Resend email change confirmation
     */
    public function actionResendChange()
    {
        /** @var \app\modules\user\models\User    $user */
        /** @var \app\modules\user\models\UserKey $userKey */

        // find userKey of type email change
        $user    = Yii::$app->user->identity;
        $userKey = Yii::$app->getModule("user")->model("UserKey");
        $userKey = $userKey::findActiveByUser($user->id, $userKey::TYPE_EMAIL_CHANGE);
        if ($userKey) {

            // send email and set flash message
            $user->sendEmailConfirmation($userKey);
            Yii::$app->session->setFlash("Resend-success", Yii::t("user", "Confirmation email resent"));
        }

        // redirect to account page
        return $this->redirect(["/user/account"]);
    }

    /**
     * Cancel email change
     */
    public function actionCancel()
    {
        /** @var \app\modules\user\models\User    $user */
        /** @var \app\modules\user\models\UserKey $userKey */

        // find userKey of type email change
        $user    = Yii::$app->user->identity;
        $userKey = Yii::$app->getModule("user")->model("UserKey");
        $userKey = $userKey::findActiveByUser($user->id, $userKey::TYPE_EMAIL_CHANGE);
        if ($userKey) {

            // remove `user.new_email`
            $user->new_email = null;
            $user->save(false);

            // expire userKey and set flash message
            $userKey->expire();
            Yii::$app->session->setFlash("Cancel-success", Yii::t("user", "Email change cancelled"));
        }

        // go to account page
        return $this->redirect(["/user/account"]);
    }

    /**
     * Forgot password
     */
    public function actionForgot()
    {
        /** @var \app\modules\user\models\forms\ForgotForm $model */

        // load post data and send email
        $model = Yii::$app->getModule("user")->model("ForgotForm");
        if ($model->load(Yii::$app->request->post()) && $model->sendForgotEmail()) {

            // set flash (which will show on the current page)
            Yii::$app->session->setFlash("Forgot-success", Yii::t("user", "Instructions to reset your password have been sent"));
        }

        // render
        return $this->render("forgot", [
            "model" => $model,
        ]);
    }

    /**
     * Reset password
     */
    public function actionReset($key)
    {
        /** @var \app\modules\user\models\User    $user */
        /** @var \app\modules\user\models\UserKey $userKey */

        // check for valid userKey
        $userKey = Yii::$app->getModule("user")->model("UserKey");
        $userKey = $userKey::findActiveByKey($key, $userKey::TYPE_PASSWORD_RESET);
        if (!$userKey) {
            return $this->render('reset', ["invalidKey" => true]);
        }

        // get user and set "reset" scenario
        $success = false;
        $user = Yii::$app->getModule("user")->model("User");
        $user = $user::findOne($userKey->user_id);
        $user->setScenario("reset");

        // load post data and reset user password
        if ($user->load(Yii::$app->request->post()) && $user->save()) {

            // consume userKey and set success = true
            $userKey->consume();
            $success = true;
        }

        // render
        return $this->render('reset', compact("user", "success"));
    }
}