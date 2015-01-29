<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('fa-IR','Settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settings-index">

    <h3><?= Html::encode($this->title) ?></h3>

 <div class="settings-form">
<?= Yii::$app->panel->html(); $this->registerJs(Yii::$app->panel->js());?>

    <?php $form = ActiveForm::begin(); ?>
	<div class="col-lg-6">

    <?= $form->field($model, 'site_off')->dropDownList(['0'=>'off', '1'=>'on']) ?>
	<?php 
	
	echo yii\imperavi\Widget::widget([
		'model' => $model,
		'attribute' => 'site_off_description',
	
	    'options' => [
	        'lang' => 'fa',
	    	'imageUpload' => Yii::getAlias('@web')."/kernal/vendor/imperavi/Upload.php",
	    	//'imageManagerJson'=> Yii::getAlias('@web')."/kernal/vendor/imperavi/Upload.php",
	    	'buttonSource' => true,   		
	    	'fixed' => true,
	    	'focus' => true,
	    ],
	    'plugins' => [
	        'fontcolor',
	    	'Imagemanager',
	    	'fontfamily',
	    	'fontsize',
	    	'table',
	    	'textdirection',
	    	'fullscreen',
	    ]
	]);
	?> 	
	</div>
	
	<div class="col-lg-6">
	<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'telephone')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'admin_language')->dropDownList(['fa-IR'=>'fa-IR']) ?>

    <?= $form->field($model, 'site_language')->dropDownList(['fa-IR'=>'fa-IR']) ?>
	</div>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('panel','Create') : Yii::t('panel','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
