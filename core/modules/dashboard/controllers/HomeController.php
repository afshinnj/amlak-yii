<?php

namespace app\modules\dashboard\controllers;

use Yii;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\data\Pagination;
use app\modules\dashboard\models\HomeDetails;
/**
 * HomeTypeController implements the CRUD actions for HomeType model.
 */
class HomeController extends Controller
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
                	'update' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all HomeType models.
     * @return mixed
     */
    public function actionIndex()
    {


    	// redirect url
    	Yii::$app->session['page'] = Yii::$app->getRequest()->url;
    	
    	
    	$query = HomeDetails::find()->where(['details_id' => 1 ,'details'=>'home Type']);
    	$countQuery = clone $query;
    	$pages = new Pagination(['totalCount' => $countQuery->count(),'pageSizeLimit' => [1,10]]);
    	$models = $query->offset($pages->offset)
    	->limit($pages->limit)
    	->all();
    	return $this->render('index', [
    			'Home' => $models,
    			'pages' => $pages,
    	]);
    }


    /**
     * Creates a new HomeType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HomeType();

        if ($model->load(Yii::$app->request->post())) {
        	$model->details_id = 1;
        	$model->details = 'home Type';
        	if($model->save()){
	             Yii::$app->session->setFlash("type-success", Yii::t("dashboard", "Successfully registered [ {StateName} ] Type", ["StateName" => $model->title]));
	            return $this->redirect(['/Home-Type']);        		
        	}

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HomeType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash("type-success", Yii::t("dashboard", "Successfully Update [ {StateName} ] Type", ["StateName" => $model->title]));
            return $this->redirect(['/Home-Type']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HomeType model.
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
     * Finds the HomeType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HomeType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HomeDetails::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
