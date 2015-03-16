<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\HomeType */

$this->title = Yii::t('dashboard','Create Home Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard','Home Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary" dir="rtl" id="Registration-variable" data-form-name="Home-Type">
                <div class="box-header">
                 	 <i class="ion ion-compose"></i>
                 	 <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                </div><!-- /.box-header -->


    <?= $this->render('_form', [ 'model' => $model,]) ?>
</div>
