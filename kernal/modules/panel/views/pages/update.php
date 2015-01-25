<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Editor\Redactor;

/* @var $this yii\web\View */
/* @var $model app\modules\panel\models\Pages */

$this->title = Yii::t('panel','Update Pages: ') . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('panel','Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('panel','Update');
?>

	
<div class="pages-update">

    <h3><?= Html::encode($this->title) ?></h3>

<div class="pages-form">
	 <div class="alert alert-info" role="alert" id="autoSave" style="display: none;">
	 	<span class="glyphicon glyphicon-save"></span>&nbsp;&nbsp;<?= Yii::t('fa-IR','Auto Save')?>
	 	
	 </div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
    
<?php 
echo yii\imperavi\Widget::widget([
	'model' => $model,
	'attribute' => 'text',
		
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
        
        
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('panel','Create') : Yii::t('panel','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	
</div>

</div>
<?php
$js = <<<JS
	setInterval(function(){
		var formURL = $('form').attr("action");
		var postData = $('form').serializeArray();
		$.ajax({ 
			url: formURL,
			type: 'post',
			data: postData,
			success:function(data) 
					{
						$('#autoSave').slideDown(1000).delay(5000).slideUp(1000);
					},
 });
	}, 120000);
JS;
$this->registerJs($js);

?>