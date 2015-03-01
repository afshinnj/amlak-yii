<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\Substate */

$this->title = 'Update Substate: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Substates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
	<div class="box box-primary" dir="rtl">
                <div class="box-header">
                  <i class="ion ion-compose"></i>
                  <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                  </div><!-- /.box-header -->


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

