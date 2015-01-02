<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
AppAsset::register($this);
/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\models\forms\ForgotForm $model
 */

$this->title = Yii::t('user', 'Forgot password');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login-body">

<?php $this->beginBody() ?>
    <div class="wrap">
        <div class="container">
 	<div class="row">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
		<div class="panel panel-default ">
			<div class="panel-heading text-right">
		           <div class="panel-title"><?= Html::encode($this->title) ?></div>
			</div>
			<div class="panel-body">
				
		
			<?php if ($flash = Yii::$app->session->getFlash('Forgot-success')): ?>
		
		        <div class="alert alert-success">
		            <p><?= $flash ?></p>
		        </div>
		
		    <?php else: ?>
		
		      
		            <div class="col-lg-12">
		            		<p class="text-info">برای بازیابی رمز عبور  ایمیل خود را وارد کنید.</p>
							
							
		                <?php $form = ActiveForm::begin(['id' => 'forgot-form']); ?>
		                    <?= $form->field($model, 'email') ?>
		                    <div class="form-group">
		                        <?= Html::submitButton(Yii::t('user', 'Submit'), ['class' => 'btn btn-primary']) ?>
		                    </div>
		                <?php ActiveForm::end(); ?>
		            </div>
		
			<?php endif; ?>
			</div>
		
		</div>
		</div>
		<div class="col-lg-3"></div>
</div>           
            
            
        </div>
    </div>
    	<div class="footer">
        <div class="container text-center">
            <p>&copy; My Company <?= date('Y') ?></p>
        </div>
	</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
