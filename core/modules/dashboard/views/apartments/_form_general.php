<?php

use yii\helpers\ArrayHelper;

use app\modules\dashboard\models\State;
use app\modules\dashboard\models\City;
use app\modules\dashboard\models\Zone;
use app\modules\dashboard\models\HomeDetails;

/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\Apartments */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
		<div class="col-xs-12 col-md-4 col-lg-4">
			<?= $form->field($homeGeneralInfo, 'state_id')->dropDownList(ArrayHelper::map(State::find()->where(['state' => 1])->orderBy('name')->All(),'id','name'),['id'=>'state']) ?>
		</div>
		<div class="col-xs-12 col-md-4  col-lg-4">
			<?= $form->field($homeGeneralInfo, 'city_id')->dropDownList(ArrayHelper::map(City::find()->where(['city' => 1])->orderBy('name')->All(),'id','name'),['id'=>'city']) ?>
		</div>
		<div class="col-xs-12  col-md-4 col-lg-4">
			<?= $form->field($homeGeneralInfo, 'zone_id')->dropDownList(ArrayHelper::map(Zone::find()->where(['area' => 1])->orderBy('name')->All(),'id','name'),['id'=>'area'])?>
		</div>
</div>

<div class="row">
		<div class="col-xs-12 col-md-4 col-lg-4">
			<?= $form->field($homeGeneralInfo, 'contract_type')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 14])->All(),'id','title')) ?>
		</div>
		<div class="col-xs-12 col-md-4  col-lg-4">
			<?= $form->field($homeGeneralInfo, 'home_type')->textInput(['maxlength' => 255,'value'=>'آپارتمان','disabled'=>'disabled']) ?>
		</div>
		<div class="col-xs-12  col-md-4 col-lg-4">
			<?= $form->field($homeGeneralInfo, 'doc_type')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 2])->All(),'title','title'))?>
		</div>
</div>

<div class="row">
		<div class="col-xs-12 col-md-4 col-lg-4">
			<?= $form->field($homeGeneralInfo, 'owner_name')->textInput(['maxlength' => 255])?>
		</div>
		<div class="col-xs-12 col-md-4  col-lg-4">
			<?= $form->field($homeGeneralInfo, 'owner_email')->textInput(['maxlength' => 255])?>
		</div>
		<div class="col-xs-12  col-md-4 col-lg-4">
			<?= $form->field($homeGeneralInfo, 'no_home')->textInput(['maxlength' => 255])?>
		</div>
</div>
		
<div class="row">
		<div class="col-xs-12 col-md-4 col-lg-4">
			<?= $form->field($homeGeneralInfo, 'tell')->textInput(['maxlength' => 255])?>
		</div>
		<div class="col-xs-12 col-md-4  col-lg-4">
			<?= $form->field($homeGeneralInfo, 'tell1')->textInput(['maxlength' => 255])?>
		</div>
		<div class="col-xs-12  col-md-4 col-lg-4">
			<?= $form->field($homeGeneralInfo, 'mobile')->textInput(['maxlength' => 255])?>
		</div>
</div>
<div class="row">
		<div class="col-lg-12">
			<?= $form->field($homeGeneralInfo, 'address_home')->textarea(['maxlength' => 255])?>
		</div>
</div>	



<?= $this->registerJs(Yii::$app->City->js());?>
