<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    	'css-js/css/login.css',
    	'css-js/css/AdminLTE.css',  	
    	'css-js/css/skins/_all-skins.css',
    	'css-js/css/fonts/font-awesome.min.css',
    	'css-js/css/fonts/ionicons.css',
    	'css-js/plugins/iCheck/square/blue.css',
    ];
	public $js = [
    	
		'css-js/js/bootstrap.js',
		'css-js/plugins/iCheck/icheck.min.js',
		'css-js/js/app.js',
			
	];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
