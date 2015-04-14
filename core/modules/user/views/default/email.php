<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\user\models\User $user
 */

$this->title = Yii::t('user', 'Change Email');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary" dir="rtl" id="User" data-form-name="Change-Email">
   <div class="box-header">
       <i class="ion ion-compose"></i>
       <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
   </div><!-- /.box-header -->
	<div class="box-body">
	    <?php if ($flash = Yii::$app->session->getFlash("Account-success")): ?>
	
	        <div class="alert alert-success">
	            <p><?= $flash ?></p>
	        </div>
	
	    <?php elseif ($flash = Yii::$app->session->getFlash("Resend-success")): ?>
	
	        <div class="alert alert-success">
	            <p><?= $flash ?></p>
	        </div>
	
	    <?php elseif ($flash = Yii::$app->session->getFlash("Cancel-success")): ?>
	
	        <div class="alert alert-success">
	            <p><?= $flash ?></p>
	        </div>
	
	    <?php endif; ?>
	
	    <?php $form = ActiveForm::begin([
	        'id' => 'account-form',
	        'options' => ['class' => 'form-horizontal'],
	        'fieldConfig' => [
	            'template' => "<div class=\"col-lg-7\">{error}</div>\n<div class=\"col-lg-3\">{input}</div>\n{label}",
	            'labelOptions' => ['class' => 'col-lg-2 control-label'],
	        ],
	        'enableAjaxValidation' => true,
	    ]); ?>
	
	
	     <?= $form->field($user, 'email') ?>
	
	    <div class="box-footer clearfix no-border">
	            <?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-primary']) ?>
	    </div>
	
	    <?php ActiveForm::end(); ?>
	
	    <div class="form-group">
	        <div class="col-lg-offset-2 col-lg-10">
	            <?php foreach ($user->userAuths as $userAuth): ?>
	                <p>Linked Social Account: <?= ucfirst($userAuth->provider) ?> / <?= $userAuth->provider_id ?></p>
	            <?php endforeach; ?>
	        </div>
	    </div>	
	</div>


</div>