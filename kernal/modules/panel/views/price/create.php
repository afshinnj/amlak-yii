<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\panel\models\TotalPrice */

$this->title = Yii::t('panel','Create Price');
$this->params['breadcrumbs'][] = ['label' => Yii::t('panel','Total Prices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="total-price-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
