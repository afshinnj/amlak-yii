<?php

namespace app\modules\dashboard\controllers;

use Yii;
use app\modules\dashboard\models\Apartments;
use app\modules\dashboard\models\HomeGeneralInfo;

use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\data\Pagination;


/**
 * ApartmentsController implements the CRUD actions for Apartments model.
 */
class ApartmentsController extends Controller
{
    public function behaviors()
    {
        return [
        		'access' => [
        				'class' => AccessControl::className(),
        				'rules' => [
        						[
        								'actions' => ['index','create','update','delete','view'],
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
            ],
        ];
    }

    /**
     * Lists all Apartments models.
     * @return mixed
     */
    public function actionIndex()
    {
    	// redirect url
    	Yii::$app->session['page'] = Yii::$app->getRequest()->url;
    	
    	
        if(Yii::$app->user->identity->role_id == 1){
    		$query = Apartments::find();
    	}else{
    		$query = Apartments::find()
    		->where(['user_id' => Yii::$app->user->identity->id])
    		->all();
    	}
    	$countQuery = clone $query;
    	$pages = new Pagination(['totalCount' => $countQuery->count(),'pageSizeLimit' => [1,10]]);
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
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Apartments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Apartments();
        $homeGeneralInfo = new HomeGeneralInfo();
		
		if($homeGeneralInfo->load(Yii::$app->request->post())){
			$homeGeneralInfo->save();
		}	
        if ($model->load(Yii::$app->request->post()) ) {
        	$facilities = Yii::$app->request->post();
        	
        	if($facilities['Apartments']['old_home'] == 4){
        		$model->old_home = Yii::t('dashboard','Age') . $facilities['Apartments']['age'];
        	}
        	
        	$model->home_general_Info_id = $homeGeneralInfo->id;
        	$model->facilities = serialize ($facilities['Apartments']['facilities']);
        	$model->save();
            return $this->redirect(['/apartments']);
        } else {
            return $this->render('create', [
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
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $homeGeneralInfo = new HomeGeneralInfo();
        
        if ($model->load(Yii::$app->request->post())) {
        	$facilities = Yii::$app->request->post();
        	if($facilities['Apartments']['old_home'] == 4){
        		$model->old_home = Yii::t('dashboard','Age') . $facilities['Apartments']['age'];
        	}
        	$model->facilities = serialize ($facilities['Apartments']['facilities']);
        	$model->save();
            return $this->redirect(['/apartments']);
        } else {
        	$model->facilities = unserialize ($model->facilities);
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
    public function actionDelete($id)
    {
    	
       $apartment = $this->findModel($id);
       HomeGeneralInfo::deleteAll(['id' => $apartment->home_general_Info_id]);
       $apartment->delete();
       return $this->redirect(Yii::$app->session['page']);
    }

    /**
     * Finds the Apartments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Apartments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Apartments::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
