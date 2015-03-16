<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\Pages */

$this->title = Yii::t('dashboard','Update Pages: ') . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard','Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('dashboard','Update');
?>

	<div class="box box-primary" dir="rtl" id="Settings" data-form-name="Pages">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                  <i class="ion ion-edit"></i>
                  <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                  </div><!-- /.box-header -->
                <div class="box-body">
<?= Yii::$app->autoSave->html(); $this->registerJs(Yii::$app->autoSave->js());?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
     <?php
        echo $form->field($model, 'text')->widget(Widget::className(), [
            //'selector' => '#my-textarea-id',
            'settings' => [
                'lang' => 'en',
                'minHeight' => 200,
                'imageUpload' => Url::to(['/dashboard/pages/image-upload']),
				'imageManagerJson' => Url::to(['/dashboard/pages/images-get']),
                'plugins' => [
                    'imagemanager',
                    //'clips',
                    'fullscreen',
                    'fontfamily',
                    'textdirection',
                    'filemanager',
                	'definedlinks',
                	'fontcolor',
                	'fontsize',
                	'table',
                ]
            ]
        ]);
    ?>   
        
        
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('dashboard','Create') : Yii::t('dashboard','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
                </div><!-- /.box-body -->
   </div>


