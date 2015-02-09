<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\panel\models\HomeType */

$this->title = Yii::t('panel','Create Home Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('panel','Home Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-type-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
