<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\TotalPrice */

$this->title = Yii::t('dashboard','Update Price: ') . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard','Total Prices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('dashboard','Update');
?>
<div class="total-price-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
