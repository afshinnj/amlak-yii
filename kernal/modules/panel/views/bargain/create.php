<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\panel\models\BargainType */

$this->title = Yii::t('panel','Create Bargain Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('panel','Bargain Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bargain-type-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
