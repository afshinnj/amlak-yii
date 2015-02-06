<?php

namespace app\modules\panel;

use Yii;

class panel extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\panel\controllers';
    public $layout = "@app/modules/views/layouts/module.php";

    public function init()
    {
        parent::init();

       // set up i8n
       if (empty(Yii::$app->i18n->translations['panel'])) {
            Yii::$app->i18n->translations['panel'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' =>'@app/language',
                'forceTranslation' => true,
                
            ];
        }
    }
}
