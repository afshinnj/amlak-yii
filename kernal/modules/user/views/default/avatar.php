<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\user\models\Profile;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\models\User $user
 */

$this->title = Yii::t('user', 'Avatar');
$this->params['breadcrumbs'][] = $this->title;
?>
    <?php if ($flash = Yii::$app->session->getFlash("Profile-success")): ?>

        <div class="alert alert-success">
            <p><?= $flash ?></p>
        </div>

    <?php endif; ?>
	<div class="col-lg-3"></div>
	<div class="col-lg-6 text-center">


    <?php $form = ActiveForm::begin([
        'id' => 'account-form',
        'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
        'fieldConfig' => [
            'template' => "<div class=\"col-lg-12\">{error}</div><br><div class=\"col-lg-12\">{input}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
        'enableAjaxValidation' => false,
    ]); ?>
		
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
        <h2><?= Html::encode(Yii::$app->user->identity->username)?></h2>
        <hr>
        
		<?= Html::img(Yii::getAlias('@web').'/uploads/avatars/'. $user->avatar,['class'=>'img-thumbnail','width'=>'150px;']);?>
		<br>
		<br>
           <?= $form->field($user, 'file')->fileInput(["class" => "form-control"]) ?>
        </div>
    </div>


    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
	</div>
	<div class="col-lg-3">

<?php //echo Html::activeDropDownList($user, 'id',ArrayHelper::map(Profile::find()->all(), 'id', 'mobile')) ?>
    <?php  echo $form->field($user, 'mobile')->widget(DepDrop::classname(), [
     'options' => ['id'=>'id'],
     'pluginOptions'=>[
         'depends'=>['cat-id'],
         'placeholder' => 'Select...',
         'url' => Url::to(['/site/subcat'])
     ]
 ]); 
    ?>
	</div>
