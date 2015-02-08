<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\panel\models\TotalPrice */

$this->title = 'Create Total Price';
$this->params['breadcrumbs'][] = ['label' => 'Total Prices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="total-price-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
