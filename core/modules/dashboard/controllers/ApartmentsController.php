<?php

namespace app\modules\dashboard\controllers;

use Yii;
use app\modules\dashboard\models\Apartments;
use app\modules\dashboard\models\HomeGeneralInfo;
use app\modules\dashboard\models\Mediafile;
use app\modules\filemanager\assets\FilemanagerAsset;
use app\modules\dashboard\models\State;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\Pagination;
use yii\web\Response;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * ApartmentsController implements the CRUD actions for Apartments model.
 */
class ApartmentsController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete', 'view', 'image', 'finish', 'upload'],
                        'allow' => true,
                        'roles' => ['admin', 'user'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                //'image' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action) {
        if (defined('YII_DEBUG') && YII_DEBUG) {
            Yii::$app->assetManager->forceCopy = true;
        }

        return parent::beforeAction($action);
    }

    /**
     * Lists all Apartments models.
     * @return mixed
     */
    public function actionIndex() {
        // redirect url
        Yii::$app->session['page'] = Yii::$app->getRequest()->url;


        if (Yii::$app->user->identity->role_id == 1) {
            $query = Apartments::find();
        } else {
            $query = Apartments::find()
                    ->where(['user_id' => Yii::$app->user->identity->id]);
        }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSizeLimit' => [1, 10]]);
        $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        return $this->render('index', [
                    'apartments' => $models,
                    'pages' => $pages,
        ]);
    }

    /**
     * Displays a single Apartments model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Apartments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Apartments();
        $homeGeneralInfo = new HomeGeneralInfo();

        if ($homeGeneralInfo->load(Yii::$app->request->post())) {
            $homeGeneralInfo->save();
        }

        if ($model->load(Yii::$app->request->post())) {
            $facilities = Yii::$app->request->post();

            if ($facilities['Apartments']['old_home'] == 4) {
                $model->old_home = $facilities['Apartments']['age'];
            }

            $model->home_general_Info_id = $homeGeneralInfo->id;
            $model->facilities = serialize($facilities['Apartments']['facilities']);
            $model->save();
            return $this->redirect(['/apartment-step2']);
        } else {
            return $this->render('step1', [
                        'model' => $model,
                        'homeGeneralInfo' => $homeGeneralInfo,
            ]);
        }
    }

    /**
     * Updates an existing Apartments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {


        $model = $this->findModel($id);
        $homeGeneralInfo = HomeGeneralInfo::findOne(['id' => $model->home_general_Info_id]);

        if ($homeGeneralInfo->load(Yii::$app->request->post())) {
            $homeGeneralInfo->save();
        }
        if ($model->load(Yii::$app->request->post())) {
            $facilities = Yii::$app->request->post();

            if ($facilities['Apartments']['old_home'] == 4) {
                $model->old_home = $facilities['Apartments']['age'];
            }

            $model->facilities = serialize($facilities['Apartments']['facilities']);
            $model->save();
            return $this->redirect(['/apartments']);
        } else {
            $model->facilities = unserialize($model->facilities);
            return $this->render('update', [
                        'model' => $model,
                        'homeGeneralInfo' => $homeGeneralInfo,
            ]);
        }
    }

    /**
     * Deletes an existing Apartments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $apartment = $this->findModel($id);
        HomeGeneralInfo::deleteAll(['id' => $apartment->home_general_Info_id]);
        $apartment->delete();
        return $this->redirect(Yii::$app->session['page']);
    }

    public function actionImage() {

        $model = new Mediafile();
        // 
        for ($index = 0; $index < 10; $index++) {
            $model = new Mediafile();
            $model->filename = "neda love $index";
            $model->save();
           // $model->upload();
        }

        /* if (Yii::$app->request->isPost) {
          $routes = $this->module->routes;

          if (UploadedFile::getInstance($model, 'image')) {
          $model->upload($routes, UploadedFile::getInstance($model, 'image'));
          }

          if (UploadedFile::getInstance($model, 'image1')) {
          $model->upload($routes, UploadedFile::getInstance($model, 'image1'));
          }

          if (UploadedFile::getInstance($model, 'image2')) {
          $model->upload($routes, UploadedFile::getInstance($model, 'image2'));
          }

          if (UploadedFile::getInstance($model, 'image3')) {
          $model->upload($routes, UploadedFile::getInstance($model, 'image3'));
          }

          if (UploadedFile::getInstance($model, 'image4')) {
          $model->upload($routes, UploadedFile::getInstance($model, 'image4'));
          }
          } */

        return $this->render('step2', ['model' => $model]);
    }

    public function actionFinish() {

        return $this->render('step3');
    }

    /**
     * Finds the Apartments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Apartments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (Yii::$app->user->identity->role_id == 1) {

            if (($model = Apartments::findOne($id)) !== null) {

                return $model;
            }
        } else {

            $model = Apartments::findOne(['user_id' => Yii::$app->user->identity->id, 'id' => $id]);

            if (($model) !== null) {

                return $model;
            } else {

                throw new NotFoundHttpException(Yii::t('dashboard', 'The requested page does not exist.'));
            }
        }
    }

}
