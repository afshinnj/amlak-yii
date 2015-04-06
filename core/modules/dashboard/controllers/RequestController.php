<?php

namespace app\modules\dashboard\controllers;

use Yii;
use app\modules\dashboard\models\RequestHome;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\data\Pagination;
use yii\base\Request;
use yii\helpers\Html;
/**
 * RequestController implements the CRUD actions for RequestHome model.
 */
class RequestController extends Controller
{
    public function behaviors()
    {
        return [
        		'access' => [
        				'class' => AccessControl::className(),
        				'rules' => [
        						[
        							'actions' => ['index','create','update','delete'],
        							'allow'   => true,
        							'roles'   => ['admin'],
        						],
        						 
        				],
        		],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ]	
        ];
    }

    /**
     * Lists all RequestHome models.
     * @return mixed
     */
    public function actionIndex()
    {
    	Yii::$app->session['page'] = Yii::$app->getRequest()->url;
    	
    	if(Yii::$app->user->identity->role_id == 1){
    		$query = RequestHome::find();
    	}else{
    		$query = RequestHome::find()
    		->where(['user_id' => Yii::$app->user->identity->id])
    		->all();
    	}
    	
    	$countQuery = clone $query;
    	$pages = new Pagination(['totalCount' => $countQuery->count(),'pageSizeLimit' => [1,10]]);
    	$models = $query->offset($pages->offset)
    	->limit($pages->limit)
    	->all();
    	return $this->render('index', [
    			'request' => $models,
    			'pages' => $pages,
    	]);
    }

    /**
     * Creates a new RequestHome model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RequestHome();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	Yii::$app->session->setFlash("Request-success", Yii::t("dashboard", "Successfully registered [ {RequestCode} ] Request", ["RequestCode" => Html::encode($model->request_code)]));
           return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RequestHome model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	Yii::$app->session->setFlash("Request-success", Yii::t("dashboard", "Successfully Update [ {RequestCode} ] Request", ["RequestCode" => Html::encode($model->request_code)]));
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RequestHome model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RequestHome model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RequestHome the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RequestHome::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
