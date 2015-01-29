<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\modules\panel\models\State;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\panel\models\Substate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="substate-form">

    <?php $form = ActiveForm::begin(); ?>
    
	<div class="col-lg-6">
		 <?= $form->field($model, 'state_id')->dropDownList(ArrayHelper::map(State::find()->All(),'id','name'));?>
	</div>
    <div class="col-lg-6">
   	 <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('panel','Create') : Yii::t('panel','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
