<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\panel\models\BargainType */

$this->title = 'Create Bargain Type';
$this->params['breadcrumbs'][] = ['label' => 'Bargain Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bargain-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
