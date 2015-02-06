<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\panel\models\Area */

$this->title = Yii::t('panel','Create Zone');
$this->params['breadcrumbs'][] = ['label' => Yii::t('panel','Zones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="area-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
