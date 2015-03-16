<?php

namespace app\modules\dashboard\controllers;

use Yii;
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
 * CityController implements the CRUD actions for City model.
 */
class CityController extends Controller
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
     * Lists all City models.
     * @return mixed
     */
    public function actionIndex()
    {
    	// redirect url
    	Yii::$app->session['page'] = Yii::$app->getRequest()->url;
    	
    	
    	$query = City::find()->where(['city' => 1]);
    	$countQuery = clone $query;
    	$pages = new Pagination(['totalCount' => $countQuery->count(),'pageSizeLimit' => [1,10]]);
    	$models = $query->offset($pages->offset)
    	->limit($pages->limit)
    	->all();
    	return $this->render('index', [
    			'City' => $models,
    			'pages' => $pages,
    	]);

    }

    /**
     * Creates a new City model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new City();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash("State-success", Yii::t("dashboard", "Successfully registered [ {StateName} ] City", ["StateName" => Html::encode($model->name)]));
            return $this->redirect(['/City-List']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing City model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	Yii::$app->session->setFlash("State-success", Yii::t("dashboard", "Successfully Update [ {StateName} ] City", ["StateName" => Html::encode($model->name)]));
            return $this->redirect(['/City-List']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing City model.
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
     * Finds the City model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return City the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = City::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
