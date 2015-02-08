<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\panel\models\BargainType */

$this->title = 'Update Bargain Type: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Bargain Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bargain-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
