<?php

namespace app\modules\dashboard\controllers;

use Yii;
use app\modules\dashboard\models\State;


use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\helpers\Json;
use yii\helpers\Html;



/**
 * StateController implements the CRUD actions for State model.
 */
class StateController extends Controller
{
	public function init()
	{
		// check for admin permission (`tbl_role.can_admin`)
		// note: check for Yii::$app->user first because it doesn't exist in console commands (throws exception)
		/*if (!empty(Yii::$app->user) && !Yii::$app->user->can("admin")) {
				throw new ForbiddenHttpException(Yii::t('fa-IR','You are not allowed to perform this action.'));
        }*/
		parent::init();
	}
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
     * Lists all State models.
     * @return mixed
     */
    public function actionIndex()
    {
    	// redirect url 
		Yii::$app->session['page'] = Yii::$app->getRequest()->url;
				
    	$query = State::find()->where(['state' => 1]);
    	$countQuery = clone $query;
    	$pages = new Pagination(['totalCount' => $countQuery->count(),'pageSizeLimit' => [1,10]]);
    	$models = $query->offset($pages->offset)
    	->limit($pages->limit)
    	->all();
    	return $this->render('index', [
    			'State' => $models,
    			'pages' => $pages,
    	]);
    }

    /**
     * Creates a new State model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new State();
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash("State-success", Yii::t("dashboard", "Successfully registered [ {StateName} ] City", ["StateName" => Html::encode($model->name)]));
            return $this->redirect(['/State-List']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing State model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
    	   	
        $model = $this->findModel((int)$id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	Yii::$app->session->setFlash("State-success", Yii::t("dashboard", "Successfully Update [ {StateName} ] City", ["StateName" => Html::encode($model->name)]));
            return $this->redirect(['/State-List']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing State model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(Yii::$app->session['page']);
    }

    /**
     * Finds the State model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return State the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = State::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
