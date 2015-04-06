<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\modules\dashboard\models\HomeDetails;

/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\Apartments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary" dir="rtl" id="Registration-home" data-form-name="Apartments">
   <div class="box-header">
      <i class="ion ion-edit"></i>
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
	  <hr>
 </div><!-- /.box-header -->
 <div class="box-body">
 
 <?php $form = ActiveForm::begin(); ?>
		
	 	<?= $form->errorSummary($model ,array("class" => "alert alert-danger"))?>
 	 	
 	 	
<fieldset>
	<legend><?= Yii::t('dashboard','Home General Info')?></legend>
	 <?= $this->render('_form_general',['homeGeneralInfo' => $homeGeneralInfo,'form'=>$form]) ?>
</fieldset>

<fieldset>
	<legend><?= Yii::t('dashboard','Home Info')?></legend>
	<div class="col-lg-6">
	
		<div class="row">
			<div class="col-xs-12 col-md-4 col-lg-4"><?= $form->field($model, 'metr')->textInput(['maxlength' => 255]) ?></div>
			<div class="col-xs-12 col-md-4 col-lg-4"><?= $form->field($model, 'Infrastructure',['template' => '{label}{input}'])->textInput(['maxlength' => 255]) ?></div>
			<div class="col-xs-12 col-md-4 col-lg-4"><?= $form->field($model, 'rooms',['template' => '{label}{input}'])->dropDownList(['1','2','3','4','5','6','7','8','9','10'])?></div>
		</div>
	    
		<div class="row">
			<div class="col-xs-12 col-md-4 col-lg-4"><?= $form->field($model, 'unit')->textInput(['maxlength' => 255]) ?></div>
			<div class="col-xs-12 col-md-4 col-lg-4"><?= $form->field($model, 'floors',['template' => '{label}{input}'])->textInput(['maxlength' => 255]) ?></div>
			<div class="col-xs-12 col-md-4 col-lg-4"><?= $form->field($model, 'floor',['template' => '{label}{input}'])->textInput(['maxlength' => 255]) ?></div>
		</div>
		      
		<div class="row">
			<div class="col-xs-12 col-md-4 col-lg-4"><?= $form->field($model, 'parking')->textInput(['maxlength' => 255]) ?></div>
			<div class="col-xs-12 col-md-4 col-lg-4"> <?= $form->field($model, 'tell')->textInput(['maxlength' => 255]) ?>	</div>
			<div class="ccol-xs-12 col-md-4 col-lg-4"><?= $form->field($model, 'units',['template' => '{label}{input}'])->textInput(['maxlength' => 255]) ?></div>
		</div>
		
		<div class="row">
			<div class="col-xs-12 col-md-4 col-lg-4">ساله <?= $form->field($model, 'age',['template' => '{input}'])->textInput(['maxlength' => 255]) ?></div>
			<div class="col-lg-8"><?= $form->field($model, 'old_home')->radioList(HomeDetails::oldHome())?></div> 
		</div>

	</div>

	<div class="col-lg-6">
	
		<div class="row">
			<div class="col-lg-4"><?= $form->field($model, 'loan')->radioList(['ندارد' ,'دارد']) ?></div> 
			<div class="col-lg-4"><?= $form->field($model, 'price_metr',['template' => '{label}{input}'])->textInput(['maxlength' => 255]) ?></div>
			<div class="col-lg-4"><?= $form->field($model, 'price_all',['template' => '{label}{input}'])->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 4])->All(),'title','title')) ?></div>
		</div>
	   
	
	 <div class="row">
	 	<div class="col-lg-6">
	 		<?= $form->field($model, 'view')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 8])->All(),'title','title')) ?>
		</div>
		<div class="col-lg-6">
	    	<?= $form->field($model, 'r_status')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 9])->All(),'title','title'))?>
	 	</div>
	 </div>
	 
	 <div class="row">
		<div class="col-lg-4">
	   	 <?= $form->field($model, 'cabinets')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 5])->All(),'title','title'))?>
		</div>
		<div class="col-lg-4">
	   	 <?= $form->field($model, 'wc')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 6])->All(),'title','title')) ?>
		</div>
		<div class="col-lg-4">
	     <?= $form->field($model, 'flooring')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 7])->All(),'title','title')) ?>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">
		 <?= $form->field($model, 'location')->radioList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 12])->All(),'title','title'),['id' => 'location']);?>
		</div>
	</div>
	   
	    	
	</div>
	
	<div class="row">
		<div class="col-lg-12"><?= $form->field($model, 'description')->textarea(['maxlength' => 255]) ?></div>
	</div>
    	
	    
</fieldset>

<fieldset>
	<legend><?= Yii::t('dashboard','facilities')?></legend>
	
	<?= $form->field($model, 'facilities',['template' => '{input}'])->checkboxlist(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 11])->All(),'title','title'),['id' => 'facilities']);?>
	
</fieldset>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('dashboard','Create') : Yii::t('dashboard','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
