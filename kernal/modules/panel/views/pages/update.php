<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

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

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
    
    <?= $form->field($model, 'text')->widget(Redactor::className(), [
        'options' => ['rows' => 6, 'id'=>'redactor'],
    ]) ?>
 
        
        
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('panel','Create') : Yii::t('panel','Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
