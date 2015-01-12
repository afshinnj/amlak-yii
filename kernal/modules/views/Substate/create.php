<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\panel\models\Substate */

$this->title = 'Create Substate';
$this->params['breadcrumbs'][] = ['label' => 'Substates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="substate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
