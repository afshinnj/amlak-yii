<?php

namespace app\modules\dashbord\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class DefaultController extends Controller
{
	public function init()
	{
		// check for admin permission (`tbl_role.can_admin`)
		// note: check for Yii::$app->user first because it doesn't exist in console commands (throws exception)
		/*if (!empty(Yii::$app->user) && !Yii::$app->user->can("user")) {
			throw new ForbiddenHttpException('You are not allowed to perform this action.');
		}
		parent::init();*/
	}	
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow'   => true,
                        'roles'   => ['user'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
	
    public function actionIndex()
    {
        return $this->render('index');
    }
}
