<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\Substate */

$this->title = Yii::t('dashboard', 'Create Substate');
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard', 'Citys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary" dir="rtl" id="Registration-location" data-form-name="Sub-State">
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

