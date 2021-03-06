<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\Area */

$this->title = 'Update Zone: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard', 'Zones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('dashboard', 'Update');
?>
<div class="box box-primary" dir="rtl" id="Registration-location" data-form-name="Zone">
    <div class="box-header">
        <i class="ion ion-compose"></i>
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div><!-- /.box-header -->


    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>

