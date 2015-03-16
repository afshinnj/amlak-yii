<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'home',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
	'language' => 'fa-IR',
	'modules' => [
		'user' => ['class' => 'app\modules\user\Module'],
		'dashboard' => ['class' => 'app\modules\dashboard\dashboard',],
		'backup' => ['class' => 'app\modules\backup\Module',],
		'filemanager' => ['class' => 'app\modules\filemanager\Module',],						
	],
    'components' => [
    	'session' => ['class' => 'yii\web\DbSession',],
    	'autoSave' => ['class' => 'app\modules\dashboard\components\autoSave',],
    	'user' => ['class' => 'app\modules\user\components\User'],
    	'jdate' => ['class' => 'jDate\DateTime'],

	    'i18n' => [
	        'translations' => [
	            'fa-IR' => [
	                'class' => 'yii\i18n\PhpMessageSource',
	                'basePath' => '@app/language',
	                'fileMap' => [
	                    'fa-IR' => 'app.php',
                	
	                ],
	            ],
	        ],
	    ],
    		
    	'urlManager' => [
    			'class' => 'yii\web\UrlManager',
    			'enablePrettyUrl' => true,
    			'showScriptName' => false,
    			'rules' => require(__DIR__ . '/routes.php'),
    	],
    		
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'YozzdUmOJaiFmwzu7liukO05pXCMjJiy',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'messageConfig' => [
                'from' => ['afshin.nj@gmail.com' => 'Admin'], // this is needed for sending emails
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
   // $config['bootstrap'][] = 'debug';
    //$config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
