<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\modules\dashboard\models\State;
use app\modules\dashboard\models\City;
use app\modules\dashboard\models\Zone;
use app\modules\dashboard\models\HomeDetails;


/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\RequestHome */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="request-home-form">

    <?php $form = ActiveForm::begin(); ?>
  
<div class="col-lg-6 col-sm-6 col-xs-12 ">
	  	<div style="padding-top: 10px !important; padding-bottom: 20px !important; font-size:18px !important; font-family: yekan;">
	           <p>استان ، شهر و مناطق مورد نظر</p>
	    </div>
		    <?= $form->field($model, 'state_id')->dropDownList(ArrayHelper::map(State::find()->where(['state' => 1])->All(),'id','name'),['id'=>'state']) ?>
		
		    <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(City::find()->where(['city' => 1])->All(),'id','name'),['id'=>'city']) ?>
		
		    <?= $form->field($model, 'zone_id')->dropDownList(ArrayHelper::map(Zone::find()->where(['area' => 1])->All(),'id','name'),['id'=>'area'])?>
</div>  
	
<div class="col-lg-6 col-sm-6 col-xs-12">
		    <div style="padding-top: 10px !important; padding-bottom: 20px !important; font-size:18px !important; font-family: yekan;">
	                        مشخصات ملک
	   		 </div>
		
		    <?= $form->field($model, 'home_type')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 1])->All(),'title','title'))?>
		
		    <?= $form->field($model, 'doc_type')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 2])->All(),'title','title'))?> 
		    
		    <?= $form->field($model, 'contract_type')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 14])->All(),'id','title'),['id' => 'contract'])?>
		
		    <?= $form->field($model, 'metr')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 3])->All(),'title','title'))?>
		<div id="total_price">
		    <?= $form->field($model, 'total_price')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 4])->All(),'title','title'))?>
		</div>
		<div id="price_rent">
		    <?= $form->field($model, 'price_rent')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 15])->All(),'title','title'),['id' => 'price_rent'])?>
		    <?= $form->field($model, 'rent')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 16])->All(),'title','title'),['id' => 'rent'])?> 
		</div>  	

</div>  


  
	
    <div class="col-lg-12">
	    <?= $form->field($model, 'description')->textarea(['maxlength' => 255]) ?>
	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('dashboard','Create') : Yii::t('dashboard','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>

  	</div>

    <?php ActiveForm::end(); ?>

</div>
<?= $this->registerJs(Yii::$app->City->js());?>