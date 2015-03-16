<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t ( 'fa-IR', 'Settings' );
$this->params ['breadcrumbs'] [] = $this->title;
?>


<div class="box box-primary" dir="rtl" id="Settings" data-form-name="Setting">
	<div class="box-header ui-sortable-handle">
		<i class="ion ion-clipboard"></i>
		<h3 class="box-title"><?= Html::encode($this->title) ?></h3>

	</div>
	<!-- /.box-header -->
	<div class="box-body">
<?= Yii::$app->autoSave->html(); $this->registerJs(Yii::$app->autoSave->js());?>

    <?php $form = ActiveForm::begin(); ?>
	<div class="col-lg-6">

    <?= $form->field($model, 'site_off')->dropDownList(['0'=>'off', '1'=>'on'])?>
         <?php
        echo $form->field($model, 'site_off_description')->widget(Widget::className(), [
            //'selector' => '#my-textarea-id',
            'settings' => [
                'lang' => 'en',
                'minHeight' => 200,
               // 'imageUpload' => Url::to(['/dashboard/pages/image-upload']),
				//'imageManagerJson' => Url::to(['/dashboard/pages/images-get']),
                'plugins' => [
                   // 'imagemanager',
                    //'clips',
                    'fullscreen',
                    'fontfamily',
                    'textdirection',
                   // 'filemanager',
                	//'definedlinks',
                	'fontcolor',
                	'fontsize',
                	//'table',
                ]
            ]
        ]);
    ?> 
	</div>

		<div class="col-lg-6">
	<?= $form->field($model, 'title')->textInput(['maxlength' => 255])?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255])?>

    <?= $form->field($model, 'telephone')->textInput(['maxlength' => 255])?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 255])?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => 255])?>

    <?= $form->field($model, 'admin_language')->dropDownList(['fa-IR'=>'fa-IR'])?>

    <?= $form->field($model, 'site_language')->dropDownList(['fa-IR'=>'fa-IR'])?>
	</div>

		<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('dashboard','Create') : Yii::t('dashboard','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>
                
                </div>
	<!-- /.box-body -->

</div>
