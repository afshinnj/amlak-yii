<?php

namespace app\modules\panel\controllers;

use Yii;
use app\modules\panel\models\BargainType;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\data\Pagination;
/**
 * BargainController implements the CRUD actions for BargainType model.
 */
class BargainController extends Controller
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
            ],
        ];
    }

    /**
     * Lists all BargainType models.
     * @return mixed
     */
    public function actionIndex()
    {
        	// redirect url
    	Yii::$app->session['page'] = Yii::$app->getRequest()->url;
    	
    	
    	$query = BargainType::find();
    	$countQuery = clone $query;
    	$pages = new Pagination(['totalCount' => $countQuery->count(),'pageSizeLimit' => [1,10]]);
    	$models = $query->offset($pages->offset)
    	->limit($pages->limit)
    	->all();
    	$dataProvider = new ActiveDataProvider([
    			'query' => BargainType::find(),
    	]);
    	return $this->render('index', [
    			'dataProvider' => $dataProvider,
    			'Bargain' => $models,
    			'pages' => $pages,
    	]);
   
    }

    /**
     * Displays a single BargainType model.
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
     * Creates a new BargainType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BargainType();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash("State-success", Yii::t("panel", "Successfully registered [ {StateName} ] Bargain", ["StateName" => $model->title]));
            return $this->redirect(['/bargain-list']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BargainType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             Yii::$app->session->setFlash("State-success", Yii::t("panel", "Successfully Update [ {StateName} ] Bargain", ["StateName" => $model->title]));
            return $this->redirect(['/bargain-list']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BargainType model.
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
     * Finds the BargainType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BargainType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BargainType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
