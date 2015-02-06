<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\panel\models\Area */

$this->title = 'Update Zone: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Zones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="area-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
