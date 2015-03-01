<?php

namespace app\modules\dashboard;

use Yii;

class dashboard extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\dashboard\controllers';
    public $layout = "@app/modules/views/layouts/module.php";

    public function init()
    {
        parent::init();

       // set up i8n
       if (empty(Yii::$app->i18n->translations['dashboard'])) {
            Yii::$app->i18n->translations['dashboard'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' =>'@app/language',
                'forceTranslation' => true,
                
            ];
        }
    }
}
