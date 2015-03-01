<?php

namespace app\modules\dashboard\controllers;

use Yii;
use app\modules\dashboard\models\Zone;
use app\modules\dashboard\models\State;
use app\modules\dashboard\models\City;

use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\data\Pagination;

/**
 * ZoneController implements the CRUD actions for Zone model.
 */
class ZoneController extends Controller
{
    public function behaviors()
    {
        return [
        	'access' => [
        			'class' => AccessControl::className(),
        			'rules' => [
        				[
        				'actions' => ['index','create','update','delete','subcat','subcity'],
        				'allow'   => true,
        				'roles'   => ['admin'],
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

    /**
     * Lists all Zone models.
     * @return mixed
     */
    public function actionIndex()
    {
    	// redirect url
    	Yii::$app->session['page'] = Yii::$app->getRequest()->url;
    	
    	
    	$query = Zone::find()->where(['area' => 1]);
    	$countQuery = clone $query;
    	$pages = new Pagination(['totalCount' => $countQuery->count(),'pageSizeLimit' => [1,10]]);
    	$models = $query->offset($pages->offset)
    	->limit($pages->limit)
    	->all();
    	return $this->render('index', [
    			'Zone' => $models,
    			'pages' => $pages,
    	]);
    }

    /**
     * Creates a new Zone model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Zone();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash("State-success", Yii::t("dashboard", "Successfully registered [ {StateName} ] Zone", ["StateName" =>  Html::encode($model->name)]));
            return $this->redirect(['/Zone-List']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Zone model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	Yii::$app->session->setFlash("State-success", Yii::t("dashboard", "Successfully Update [ {StateName} ] Zone", ["StateName" => Html::encode($model->name)]));
            return $this->redirect(['/Zone-List']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Zone model.
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
     * Finds the Zone model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Zone the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Zone::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    


    public function actionSubcat() {
    	 
    	$id = Yii::$app->request->post('id');
    	$area = City::find()->where(['state_id'=> $id, 'city' => 1])->all();
    
    	foreach ($area as $row){
    		echo '<option value="'.$row['id'].'">'.Html::encode($row['name']).'</option>';
    	}
    		
    	//echo Json::encode(['id'=> $row['id'], 'selected'=>$row['name']]);
    }
    
    public function actionSubcity() {
    
    	$id = Yii::$app->request->post('id');
    	$area = Zone::find()->where(['city_id'=> $id])->all();
    
    	foreach ($area as $row){
    		echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    	}
    
    	//echo Json::encode(['id'=> $row['id'], 'selected'=>$row['name']]);
    }    
}
