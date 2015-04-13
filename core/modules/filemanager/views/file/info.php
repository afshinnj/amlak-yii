<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\filemanager\assets\FilemanagerAsset;

//use app\modules\filemanager\Module;

/* @var $this yii\web\View */
/* @var $model app\modules\filemanager\models\Mediafile */
/* @var $form yii\widgets\ActiveForm */

$bundle = FilemanagerAsset::register($this);
?>

<?= Html::img($model->getDefaultThumbUrl($bundle->baseUrl)) ?>

<ul class="detail">
    <li><?= $model->type ?></li>
    <li><?= Yii::$app->formatter->asDatetime($model->getLastChanges()) ?></li>
    <?php if ($model->isImage()) : ?>
        <li><?= $model->getOriginalImageSize($this->context->module->routes) ?></li>
<?php endif; ?>
    <li><?= $model->getFileSize() ?></li>
    <li></li>
</ul>

<div class="filename"><?= $model->filename ?></div>

<?php
$form = ActiveForm::begin([
            'action' => ['file/update', 'id' => $model->id],
            'options' => ['id' => 'control-form'],
        ]);
?>
<?php if ($model->isImage()) : ?>
    <?= $form->field($model, 'alt')->textInput(['class' => 'form-control input-sm']); ?>
<?php endif; ?>

<?= $form->field($model, 'description')->textarea(['class' => 'form-control input-sm']); ?>

<?= Html::hiddenInput('id', $model->id) ?>

<?php if ($message = Yii::$app->session->getFlash('mediafileUpdateResult')) : ?>
    <div class="text-success"><?= $message ?></div>
    <?php endif; ?>  
<hr>
<div class="text-right">
    <?=
    Html::a(Yii::t('filemanager', 'Delete') . ' <i class="ion ion-trash-a"></i>', ['file/delete/', 'id' => $model->id], [
        'class' => 'text-danger btn btn-danger',
        'data-confir' => Yii::t('yii', 'Are you sure you want to delete this item?'),
        'data-id' => $model->id,
        'role' => 'delete',
            ]
    )
    ?>
<?= Html::submitButton(Yii::t('filemanager', 'Save'), ['class' => 'btn btn-success']) ?> 
</div>




<?php ActiveForm::end(); ?>