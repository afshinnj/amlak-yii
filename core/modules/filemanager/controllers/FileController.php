<?php

namespace app\modules\filemanager\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\modules\filemanager\models\Mediafile;
use app\modules\filemanager\assets\FilemanagerAsset;
use yii\helpers\Url;

class FileController extends Controller {

    public $enableCsrfValidation = false;

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'uploadmanager', 'update', 'upload', 'delete', 'resize', 'info'],
                        'allow' => true,
                        'roles' => ['admin', 'user'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'update' => ['post'],
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

    public function actionIndex() {
        $model = new Mediafile();
        $dataProvider = $model->search();
        $dataProvider->pagination->defaultPageSize = 15;

        return $this->render('index', [
                    'model' => $model,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUploadmanager() {
        return $this->render('uploadmanager', ['model' => new Mediafile()]);
    }

    /**
     * Provides upload file
     * @return mixed
     */
    public function actionUpload() {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new Mediafile();
        $routes = $this->module->routes;
        $model->saveUploadedFile($routes);
        $bundle = FilemanagerAsset::register($this->view);

        if ($model->isImage()) {
            $model->createThumbs($routes, $this->module->thumbs);
        }

        $response['files'][] = [
            'url' => $model->url,
            'thumbnailUrl' => $model->getDefaultThumbUrl($bundle->baseUrl),
            'name' => $model->filename,
            'type' => $model->type,
            'size' => $model->file->size,
            'deleteUrl' => Url::to(['file/delete', 'id' => $model->id]),
            'deleteType' => 'POST',
        ];

        $user_id = Yii::$app->user->identity->id;
        $model->addOwner($user_id);

        return $response;
    }

    /**
     * Updated mediafile by id
     * @param $id
     * @return array
     */
    public function actionUpdate($id) {
        $model = Mediafile::findOne($id);
        $message = Yii::t('filemanager', 'Changes not saved.');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $message = Yii::t('filemanager', 'Changes saved!');
        }

        Yii::$app->session->setFlash('mediafileUpdateResult', $message);

        return $this->renderPartial('info', [
                    'model' => $model,
                    'strictThumb' => null,
        ]);
    }

    /**
     * Delete model with files
     * @param $id
     * @return array
     */
    public function actionDelete($id) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $routes = $this->module->routes;

        $model = Mediafile::findOne($id);

        if ($model->isImage()) {
            $model->deleteThumbs($routes);
        }

        $model->deleteFile($routes);
        $model->delete();

        return ['success' => 'true'];
    }

    /**
     * Resize all thumbnails
     */
    public function actionResize() {
        $models = Mediafile::findByTypes(Mediafile::$imageFileTypes);
        $routes = $this->module->routes;

        foreach ($models as $model) {
            if ($model->isImage()) {
                $model->deleteThumbs($routes);
                $model->createThumbs($routes, $this->module->thumbs);
            }
        }

        Yii::$app->session->setFlash('successResize');
        $this->redirect(Url::to(['default/settings']));
    }

    /** Render model info
     * @param int $id
     * @param string $strictThumb only this thumb will be selected
     * @return string
     */
    public function actionInfo($id, $strictThumb = null) {
        $model = Mediafile::findOne($id);
        return $this->renderPartial('info', [
                    'model' => $model,
                    'strictThumb' => $strictThumb,
        ]);
    }

}
