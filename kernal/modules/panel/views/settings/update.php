<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\modules\panel\models\Settings */

$this->title = 'Update Settings: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

    <h1><?= Html::encode($this->title) ?></h1>



