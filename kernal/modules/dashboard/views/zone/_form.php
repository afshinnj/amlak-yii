<?php


use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\modules\dashboard\models\City;
use app\modules\dashboard\models\State;

/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\Area */
/* @var $form yii\widgets\ActiveForm */
?>



    <?php $form = ActiveForm::begin(); ?>
        <div class="box-body">
	    <div class="col-lg-4">
			<?= $form->field($model, 'name')->textInput(['maxlength' => 50],['id'=>'area']) ?>
		</div>
		
		<div class="col-lg-4">
			<?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(City::find()->where(['city'=>1])->All(),'id','name'),['id'=>'city']);?>
		</div>
		
		<div class="col-lg-4">
			<?= $form->field($model, 'state_id')->dropDownList(ArrayHelper::map(State::find()->where(['state'=>1])->All(),'id','name'),['id'=>'state']);?>
		</div>
   		</div>
    <div class="box-footer clearfix no-border">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('dashboard','Create') : Yii::t('dashboard','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>



<?php 
$js = <<<JS
State();
City();	
$('#state').change(function(){
	State();
});
$('#city').change(function(){
	City();
});		
function State(){
		$('#city').prop('disabled', true);
		$('#area').prop('disabled', true);	
		$("#city").html("<option>Please wait</option>");
		$("#area").html("<option>Please wait</option>");
		var id = $('#state').val();
		var formURL = 'subcat';
		var postData = {'id' : id};
		$.ajax({
			url: formURL,
			type: 'post',
			data: postData,
			success:function(data)
					{
					if(data){
						$('#city').prop('disabled', false);
						$('#area').prop('disabled', false);
						$("#city").html(data);
					}else{
						$("#city").html(data);
					}

					City();
			    	}
		 });
};
function City(){
			
		var id = $('#city').val();
		var formURL = 'subcity';
		var postData = {'id' : id};
		$.ajax({
			url: formURL,
			type: 'post',
			data: postData,
			success:function(data)
					{
						if(data){
							$("#area").html(data);
						}else{
							$("#area").html('')
							}
						
			    	}
		 });
};		


JS;
$this->registerJs($js)

?>