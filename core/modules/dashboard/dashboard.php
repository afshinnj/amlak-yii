<?php

namespace app\modules\dashboard;

use Yii;

class dashboard extends \yii\base\Module {

    public $controllerNamespace = 'app\modules\dashboard\controllers';
    public $layout = "@app/modules/views/layouts/module.php";

    /**
     * @var array upload routes
     */
    public static $routes = [
        // base absolute path to web directory
        'baseUrl' => '',
        // base web directory url
        'basePath' => '@webroot',
        // path for uploaded files in web directory
        'uploadPath' => 'uploads',
    ];

    /**
     * @var array thumbnails info
     */
    public $thumbs = [
        'small' => [
            'name' => 'Small size',
            'size' => [120, 80],
        ],
        'medium' => [
            'name' => 'Medium size',
            'size' => [400, 300],
        ],
        'large' => [
            'name' => 'Large size',
            'size' => [800, 600],
        ],
    ];

    /**
     * @var array default thumbnail size, using in filemanager view.
     */
    private static $defaultThumbSize = [128, 128];

    public static function thumbs() {
        return $thumbs = [
        'small' => [
            'name' => 'Small size',
            'size' => [120, 80],
        ],
        'medium' => [
            'name' => 'Medium size',
            'size' => [400, 300],
        ],
        'large' => [
            'name' => 'Large size',
            'size' => [800, 600],
        ],
    ];
    }

    /**
     * @return array default thumbnail size. Using in filemanager view.
     */
    public static function getDefaultThumbSize() {
        return self::$defaultThumbSize;
    }

    public function init() {
        parent::init();

        // set up i8n
        if (empty(Yii::$app->i18n->translations['dashboard'])) {
            Yii::$app->i18n->translations['dashboard'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@app/language',
                'forceTranslation' => true,
            ];
        }
    }

}
