<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\modules\dashboard\models\State;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\Substate */
/* @var $form yii\widgets\ActiveForm */
?>



    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body">
    <div class="col-lg-6">
   	 <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
    </div>
	<div class="col-lg-6">
		 <?= $form->field($model, 'state_id')->dropDownList(ArrayHelper::map(State::find()->where(['state' => 1])->All(),'id','name'));?>
	</div>
	</div>
    <div class="box-footer clearfix no-border">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('dashboard','Create') : Yii::t('dashboard','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


