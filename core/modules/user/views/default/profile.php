<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Profile');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary" dir="rtl" id="User" data-form-name="Change-Profile">
   <div class="box-header">
       <i class="ion ion-compose"></i>
       <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
   </div><!-- /.box-header -->
	
	<div class="box-body">
	    <?php if ($flash = Yii::$app->session->getFlash("Profile-success")): ?>
	        <div class="alert alert-success">
	            <p><?= $flash ?></p>
	        </div>
	    <?php endif; ?>	
	    
	        <?php $form = ActiveForm::begin([
		        'id' => 'profile-form',
		        'options' => ['class' => 'form-horizontal'],
		        'fieldConfig' => [
		            'template' => "<div class=\"col-lg-7\">{error}</div>\n<div class=\"col-lg-3\">{input}</div>\n{label}",
		            'labelOptions' => ['class' => 'col-lg-2 control-label'],
		        ],
		        'enableAjaxValidation' => true,
		    ]); ?>
		    <?= $form->field($profile, 'full_name') ?> 
		    <?= $form->field($profile, 'mobile') ?>
		    
		  <div class="fbox-footer clearfix no-border">
            <?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-primary']) ?>
  		  </div> 
  		  
  		 <?php ActiveForm::end(); ?>   
	</div>

</div>