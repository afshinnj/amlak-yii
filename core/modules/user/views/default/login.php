<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Faker\Provider\Image;
use app\assets\AppAsset;
use yii\captcha\Captcha;

use app\modules\dashboard\models\Pages;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\models\LoginForm $model
 */

$this->title = Yii::t('user', 'Login');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login-page" style="padding-top: 50px;">

<?php $this->beginBody() ?>
    
        <div class="container">
		 	<div class="row">
		 		<div class="col-lg-8">
		 				<div class="box box-primary" dir="rtl">
			                <div class="box-header">
			                  <i class="ion ion-clipboard"></i>
			                  <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
			                  </div><!-- /.box-header -->
			                <div class="box-body">
									<?= $page['text']?>
			                </div><!-- /.box-body -->
			 				</div>
		 		</div>
		 		<div class="col-lg-4">
		 				<div class="box box-primary" dir="rtl">
			                <div class="box-header">
			                  <i class="ion ion-locked"></i>
			                  <h3 class="box-title"></h3>
			                  </div><!-- /.box-header -->
			                <div class="box-body">
			<div style="text-align: center; margin-bottom: 20px;" >
								<?= Html::img('@web/images/avatar.png',['class' =>'img-circle','width'=>'120px']);?>
								<h4><?= Yii::t('fa-IR','Administration')?></h4>
								<small class="text-muted"><?= Yii::t('fa-IR','Please enter your login details.')?></small>
							</div>
				
						<?php $form = ActiveForm::begin(['id' => 'login-form','options' => ['class' => 'form-horizontal'],]); ?>
							
						       <?= $form->field($model, 'username',['template' => '<div class="col-lg-12 has-feedback"><span class="glyphicon glyphicon-envelope form-control-feedback"></span>{input}{error}{hint}</div>',])->textInput(array('placeholder' => 'Email'));?>
						       
						       <?= $form->field($model, 'password',['template' => '<div class="col-lg-12 has-feedback"><span class="glyphicon glyphicon-lock form-control-feedback"></span>{input}{error}{hint}</div>',])->passwordInput(array('placeholder' => 'Password')) ?>
						         <?php 
						         $captcha = Pages::findOne(['id' => 1]);
						         if($captcha->captcha_count == Yii::$app->session['captcha'] and $captcha->captcha_show == 1):
						         ?>
						       <div class="col-lg-12 verifyCode">
								   <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
								   		'captchaAction' => '/site/captcha',
						                'template' => '<div class="col-xs-6">{image}</div><div class="col-xs-6 input">{input}</div>',
								   			
						            ]) ?>  
				              </div>
				             	<?php endif?>
						    <div style="margin-bottom: 10px;">  
							  <?= Html::submitButton(Yii::t('user', 'Login'), ['class' => 'btn btn-primary btn-block btn-flat']) ?>
							</div>   
						<?php ActiveForm::end(); ?>
					<div class="box-footer text-center">
						<?= Html::a(Yii::t("user", "Register"), ["/SignUp"],['class' => 'btn btn-info btn-block btn-flat']) ?>
						<br>
							<?= Html::a(Yii::t("user", "Forgot password") . "?", ["/user/forgot"]) ?><br>
							<?= Html::a(Yii::t("user", "Resend confirmation email"), ["/user/resend"]) ?>
				  	
					</div>
			                </div><!-- /.box-body -->
			 				</div>
		 		</div>

			</div>   <!-- row -->          
        </div> <!-- container -->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

