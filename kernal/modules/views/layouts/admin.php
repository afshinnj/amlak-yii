<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

            NavBar::begin([
                'options' => [
                    'class' => 'navbar navbar-default navbar-fixed-top',
                ],
            ]);
        	         
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
            	'encodeLabels' => false,
                'items' => [
                    ['label' => Yii::t('fa-IR','Dashbord'). ' '. '<spam class="glyphicon glyphicon-dashboard"></spam>', 'url' => ['/panel']],
                    
                ],
            ]);
            echo Nav::widget([
            		'options' => ['class' => 'navbar-nav navbar-right'],
            		'items' => [
            				[
            				'label' => Yii::t('fa-IR','Settings'),
            				'items' =>
            						[
            						['label'=>Yii::t('fa-IR','Pages'),'url' =>['/Pages-List']],
            						['label'=>Yii::t('fa-IR','Settings'),'url' =>['/settings']],
            						],
            				],
            		],
            ]);
            echo Nav::widget([
            		'options' => ['class' => 'navbar-nav navbar-right'],
            		'items' => [
            				[
            				'label' => Yii::t('fa-IR','Registration variable'),
            				'items' =>
            						[
	            						['label'=>Yii::t('fa-IR','State'),'url' =>['/State-List']],
	            						['label'=>Yii::t('fa-IR','Sub State'),'url' =>['/City-List']],
            							['label'=>Yii::t('fa-IR','Area'),'url' =>['/Area-List']],
            							'<li class="divider"></li>',
            							['label'=>Yii::t('fa-IR','Home Type'),'url' =>['/Home-Type']],
            							['label'=>Yii::t('fa-IR','Bargain Type'),'url' =>['/Bargain-Type']],
            							['label'=>Yii::t('fa-IR','Total Price'),'url' =>['/Total-Price']],
            							['label'=>Yii::t('fa-IR','Area Groups'),'url' =>['/Area-Groups']],
            						],
            				],
            		],
            ]);

            echo Nav::widget([
            		'options' => ['class' => 'navbar-nav navbar-right'],
            		'items' => [
            				[
            				'label' => Yii::t('fa-IR','Home'),
            				'items' =>
            						[
            							['label'=>Yii::t('fa-IR','Registration Home'),'url' =>['/change-password']],
            							['label'=>Yii::t('fa-IR','House request'),'url' =>['/change-profile']],
            						],
            				],
            		],
            ]);
			echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right'],
					'items' => [
					[
						'label' => Yii::t('fa-IR','User'),
						'items' =>
						 [
							['label'=>Yii::t('fa-IR','Change Password'),'url' =>['/change-password']],
							['label'=>Yii::t('fa-IR','Change Profile'),'url' =>['/change-profile']],
						 	['label'=>Yii::t('fa-IR','Change Avatar'),'url' =>['/change-avatar']],
						 ],
					],
					],
				]);

            echo Nav::widget([
            		'options' => ['class' => 'navbar-nav navbar-left'],
					'encodeLabels' => false,
            		'items' => [
            			['label' =>'<span class="glyphicon glyphicon-log-out"></span>' .' '. Yii::t("fa-IR", "logout  [ {displayName} ]", ["displayName" =>Yii::$app->user->identity->username]),
            			'url' => ['/logout'],
            			'linkOptions' => ['data-method' => 'post']],
            			
            		],]);

            NavBar::end();
