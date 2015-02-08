<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\panel\models\TotalPrice */

$this->title = 'Update Total Price: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Total Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="total-price-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
