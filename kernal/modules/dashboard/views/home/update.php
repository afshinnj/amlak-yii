<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\HomeType */

$this->title = Yii::t('dashboard','Update Home Type: ') . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard','Home Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('dashboard','Update');
?>
<div class="home-type-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
