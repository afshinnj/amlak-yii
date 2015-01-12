<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\panel\models\State */

$this->title = Yii::t('panel','Update State: ') . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('panel','States'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('panel','Update');
?>
<div class="state-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
