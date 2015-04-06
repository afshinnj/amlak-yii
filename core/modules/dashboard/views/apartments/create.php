<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\Apartments */

$this->title = Yii::t('dashboard','Create Apartments');
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard','Apartments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <?= $this->render('_form', [
        'model' => $model,
    	'homeGeneralInfo' => $homeGeneralInfo,
    ]) ?>

