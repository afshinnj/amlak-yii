<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\panel\models\Substate */

$this->title = Yii::t('panel','Create Substate');
$this->params['breadcrumbs'][] = ['label' => Yii::t('panel','Citys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="substate-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
