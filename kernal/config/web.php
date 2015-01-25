<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'amlak-1',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'fa-IR',
	
	'defaultRoute' => 'frontend',
		
    'modules' => [
        'user' => ['class' => 'app\modules\user\Module',],
        'panel' => ['class' => 'app\modules\panel\panel',],
        'dashbord' => ['class' => 'app\modules\dashbord\Module',],
    	'frontend' => ['class' => 'app\modules\frontend\Module',],
    				
    		
    ],   
    'components' => [
    	'panel' => ['class' => 'app\modules\panel\components\panel',],
    		
    				
    		
    		
    		
	    'i18n' => [
	        'translations' => [
	            'fa-IR' => [
	                'class' => 'yii\i18n\PhpMessageSource',
	                //'basePath' => '@app/messages',
	                //'sourceLanguage' => 'en-US',
	                'fileMap' => [
	                    'fa-IR' => 'fa-IR.php',
	                ],
	            ],
	        ],
	    ],
    		
    	'jdate' => ['class' => 'jDate\DateTime'],

    	'urlManager' => [
    			'class' => 'yii\web\UrlManager',
    			'enablePrettyUrl' => true,
    			'showScriptName' => false,
    			'rules' => require(__DIR__ . '/routes.php'),
    	],        
        'session' => [
            'class' => 'yii\web\DbSession',
             //'db' => 'yiicms',
             //'sessionTable' => 'session',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
        	'enableCsrfValidation' => true,
            'cookieValidationKey' => 'OsNsRu4auDlbelofR653QdY7pNyGbeEN',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'class' => 'app\modules\user\components\User',
        	'loginUrl' => ['login'],
        ],
        'errorHandler' => [
            'errorAction' => 'frontend/default/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
               'messageConfig' => [
                'from' => ['admin@website.com' => 'Admin'], // this is needed for sending emails
                'charset' => 'UTF-8',
            ]
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    //$config['bootstrap'][] = 'debug';
   // $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
