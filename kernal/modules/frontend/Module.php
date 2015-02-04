<?php

namespace app\modules\frontend;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\frontend\controllers';
    public $layout = "@app/modules/frontend/views/frontend.php";
    
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
