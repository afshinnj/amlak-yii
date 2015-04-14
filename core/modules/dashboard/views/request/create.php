<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\RequestHome */

$this->title = Yii::t('dashboard', 'Create Request Home');
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard', 'Request Homes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary" dir="rtl" id="Registration-home" data-form-name="Request-Home">
    <div class="box-header">
        <i class="ion ion-edit"></i>
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div><!-- /.box-header -->

    <div class="box-body">
        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>

        <div class="clearfix"></div>
    </div>
</div>
