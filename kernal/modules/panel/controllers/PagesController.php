<?php

namespace app\modules\panel\controllers;

use Yii;
use app\modules\panel\models\Pages;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\data\Pagination;


/**
 * PagesController implements the CRUD actions for Pages model.
 */
class PagesController extends Controller
{
    public function behaviors()
    {
        return [
        	'access' => [
        			'class' => AccessControl::className(),
        			'rules' => [
        				[
        				'actions' => ['index','update','upload'],
        				'allow'   => true,
        				'roles'   => ['admin'],
        				],
        						 
        			],
        		],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                	'update' => ['post'],
                	'upload' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pages models.
     * @return mixed
     */
    public function actionIndex()
    {
    	// redirect url
    	Yii::$app->session['page'] = Yii::$app->getRequest()->url;
    	
    	
    	$query = Pages::find();
    	$countQuery = clone $query;
    	$pages = new Pagination(['totalCount' => $countQuery->count(),'pageSizeLimit' => [1,10]]);
    	$models = $query->offset($pages->offset)
    	->limit($pages->limit)
    	->all();
    	$dataProvider = new ActiveDataProvider([
    			'query' => Pages::find(),
    	]);
    	return $this->render('index', [
    			'dataProvider' => $dataProvider,
    			'Pages' => $models,
    			'pages' => $pages,
    	]);
    }

    /**
     * Updates an existing Pages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	// validate for ajax request
        	if (!Yii::$app->request->isAjax) {
        	     Yii::$app->session->setFlash("State-success", Yii::t("panel", "Successfully Update [ {PageName} ] Page", ["PageName" => $model->title]));
          		 return $this->redirect(['/Pages-List']);
        	}

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Finds the Pages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
