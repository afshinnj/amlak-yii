<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\Pages */

$this->title = Yii::t('dashboard','Update Pages: ') . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard','Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('dashboard','Update');
?>

	<div class="box box-primary" dir="rtl">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                  <i class="ion ion-edit"></i>
                  <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                  </div><!-- /.box-header -->
                <div class="box-body">
<?= Yii::$app->autoSave->html(); $this->registerJs(Yii::$app->autoSave->js());?>
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
        <?= Html::submitButton($model->isNewRecord ? Yii::t('dashboard','Create') : Yii::t('dashboard','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
                </div><!-- /.box-body -->
   </div>


