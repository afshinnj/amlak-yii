<?php

namespace app\modules\panel\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
class DefaultController extends Controller
{
	public function behaviors()
	{
		return [
		'access' => [
			'class' => AccessControl::className(),
			//'only' => ['index','create','update','view','hello'],
			'rules' => [
							[
							'actions' => ['index','create','update','view'],
							'allow' => true,
							'roles' => ['admin','author'],
							],
							[
							'actions' => ['hello'],
							'allow' => true,
							'roles' => ['user'],
							],
						],
					],

		];
	}

    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionCreate()
    {
        return $this->render('index');
    }


    public function actionHello()
    {
    	return $this->render('index');
    }
}
