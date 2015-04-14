<?php

namespace app\modules\filemanager;

use Yii;

class Module extends \yii\base\Module {

    public $controllerNamespace = 'app\modules\filemanager\controllers';
    public $layout = "@app/modules/views/layouts/module.php";
    public $defaultRoute = 'file';

    /**
     * @var array upload routes
     */
    public $routes = [
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

    public function init() {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations() {
        // set up i8n
        if (empty(Yii::$app->i18n->translations['filemanager'])) {
            Yii::$app->i18n->translations['filemanager'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@app/language',
                'forceTranslation' => true,
            ];
        }
    }

    public static function t($category, $message, $params = [], $language = null) {
        if (!isset(Yii::$app->i18n->translations['modules/filemanager/*'])) {
            return $message;
        }

        return Yii::t("modules/filemanager/$category", $message, $params, $language);
    }

    /**
     * @return array default thumbnail size. Using in filemanager view.
     */
    public static function getDefaultThumbSize() {
        return self::$defaultThumbSize;
    }

}
