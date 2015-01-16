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
							'actions' => ['index'],
							'allow' => true,
							'roles' => ['admin'],
							],
						],
					],

		];
	}

    public function actionIndex()
    {
    	
        return $this->render('index');
    }

}
