<?php

namespace app\modules\dashbord;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\dashbord\controllers';
    public $layout = "@app/modules/views/layouts/modules.php";
    public function init()
    {
        parent::init();



    }
}
