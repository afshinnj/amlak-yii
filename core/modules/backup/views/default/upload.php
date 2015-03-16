<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Document */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t('dashboard','Backup');
$this->params['breadcrumbs'][] = $this->title;
?>
	<div class="box box-primary" dir="rtl">
                <div class="box-header">
                  <i class="fa fa-jsfiddle"></i>
                  <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                  </div><!-- /.box-header -->
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                <div class="box-body">

					<?= $form->field($model, 'upload_file')->fileInput() ?>

                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                   <?=Html::submitButton('Save <i class="fa fa-plus"></i>',['class' => 'btn btn-default pull-right']) ?>
  
                </div>
                <?php ActiveForm::end(); ?>
   </div>

                
