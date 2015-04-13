<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\State */
/* @var $form yii\widgets\ActiveForm */
?>


<?php $form = ActiveForm::begin(); ?>
<div class="box-body">
    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
</div><!-- /.box-body -->
<div class="box-footer clearfix no-border">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('dashboard', 'Create') : Yii::t('dashboard', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div> 
<?php ActiveForm::end(); ?>

