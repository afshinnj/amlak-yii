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
        'css/site.css',
    	'css/login.css',
    	'css/panel.css',
    	//'css/redactor.css',
    ];
	public $js = [
    	//'js/redactor.js',
    	//'js/table.js',
    	//'js/definedlinks.js',
    	//'js/fontcolor.js',
    	//'js/fontfamily.js',
    	//'js/fontsize.js',
    	//'js/imagemanager.js',
    	//'js/textdirection.js',
			
	];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
