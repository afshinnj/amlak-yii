<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bargain Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bargain-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bargain Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'create_time',
            'update_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
