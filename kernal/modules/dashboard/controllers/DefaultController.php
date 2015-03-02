<?php

namespace app\modules\dashboard\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

class DefaultController extends Controller {
	public function behaviors() {
		return [ 
				'access' => [ 
						'class' => AccessControl::className (),
						
						// 'only' => ['index','create','update','view','hello'],
						'rules' => [ 
								[ 
										'actions' => [ 
												'index' 
										],
										'allow' => true,
										'roles' => [ 
												'admin',
												'user' 
										] 
								] 
						] 
				],
				[ 
						'class' => 'yii\filters\PageCache',
						'only' => [ 
								'index' 
						],
						'duration' => 60,
						'variations' => [ 
								\Yii::$app->language 
						],
						'dependency' => [ 
								'class' => 'yii\caching\DbDependency',
								'sql' => 'SELECT COUNT(*) FROM {{%menus}}' 
						] 
				] 
		];
	}
	public function actionIndex() {
		if (Yii::$app->user->can ( "admin" )) {
			return $this->render ( 'index' );
		}
		
		if (Yii::$app->user->can ( "user" )) {
			return $this->render ( 'index' );
		}
	}
}
