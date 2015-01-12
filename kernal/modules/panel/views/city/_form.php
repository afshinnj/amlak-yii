<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\panel\models\Substate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="substate-form">

    <?php $form = ActiveForm::begin(); ?>
    
	<div class="col-lg-6">
	 <?= $form->field($model, 'state_id')->dropDownList($model::stateDropdown()); ?>
	</div>
    <div class="col-lg-6">
   	 <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('panel','Create') : Yii::t('panel','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
