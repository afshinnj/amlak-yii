<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\HomeType */

$this->title = Yii::t('dashboard','Create Home Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard','Home Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-type-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
