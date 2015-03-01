<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\Area */

$this->title = Yii::t('dashboard','Update Area: ') . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard','Areas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="area-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
