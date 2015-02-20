<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\panel\models\BargainType */

$this->title = Yii::t('panel','Update Bargain Type: ') . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('panel','Bargain Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('panel','Update');
?>
<div class="bargain-type-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
