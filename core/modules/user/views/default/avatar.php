<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\user\models\Profile;
/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\models\User $user
 */

$this->title = Yii::t('user', 'Avatar');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary" dir="rtl" id="User" data-form-name="Change-Avatar"> 
   <div class="box-header">
       <i class="ion ion-compose"></i>
       <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
   </div><!-- /.box-header -->
  		    <?php $form = ActiveForm::begin([
		        'id' => 'account-form',
		        'options' => ['class' => 'form-horizontal','enctype' => 'multipart/form-data'],
		        'fieldConfig' => [
		            'template' => "{error}{input}",
		        ],
		        'enableAjaxValidation' => false,
		    ]); ?>
	<div class="box-body text-center">
	    <?php if ($flash = Yii::$app->session->getFlash("Avatar-success")): ?>
	        <div class="alert alert-success">
	            <p><?= $flash ?></p>
	        </div>
	    <?php endif; ?>	
   		        <h2><?= Html::encode(Yii::$app->user->identity->username)?></h2>
		        <hr>
		        <?php if($user->avatar):?>
				<?= Html::img(Yii::getAlias('@web').'/uploads/avatars/'. $user->avatar,['class'=>'img-thumbnail','width'=>'150px;']);?>
				<?php else :?>
				<?= Html::img(Yii::getAlias('@web').'/images/avatar.png',['class'=>'img-thumbnail','width'=>'150px;']);?>
				<?php endif?>
				<br>
				<br>
				<div style="width: 400px; margin: auto;">
					<?= $form->field($user, 'file')->fileInput(["class" => "form-control"]) ?>
				</div>
           		

	         <div class="fbox-footer no-border">
	         
	           	<?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-primary']) ?>
         
           </div>
 
  </div>
    
           <?php ActiveForm::end(); ?>


	
</div>
