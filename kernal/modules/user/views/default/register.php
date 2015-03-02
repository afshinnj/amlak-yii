<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
AppAsset::register($this);
$this->title = Yii::t('user', 'Register');
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
				<div class="col-lg-8 ">
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title"><?= Html::encode($this->title) ?></div>
	</div>
	<div class="panel-body">
				<?= $page['option_value']?>
	</div>
	<div class="panel-footer">
	
	</div>
</div>

</div>
				<div class = "col-lg-4">
					<div class="panel panel-default">
						<div class="panel-body">
								<?php if ($flash = Yii::$app->session->getFlash("Register-success")): ?>
				
				        <div class="alert alert-success">
				            <p><?= $flash ?></p>
				        </div>
				
				    <?php else: ?>
				
				        <p><?= Yii::t("user", "Please fill out the following fields to register:") ?></p>
				
				        <?php $form = ActiveForm::begin([
				            'id' => 'register-form',
				            'options' => ['class' => 'form-horizontal'],
				            'fieldConfig' => [
				                'template' => "<div class=\"col-lg-12\">{input}{error}</div>",
				            ],
				            'enableAjaxValidation' => true,
				        ]); ?>
				
				        <?php if (Yii::$app->getModule("user")->requireEmail): ?>
				            <?= $form->field($user, 'email')->textInput(array('placeholder' => 'Email')) ?>
				        <?php endif; ?>
				
				        <?php if (Yii::$app->getModule("user")->requireUsername): ?>
				            <?= $form->field($user, 'username')->textInput(array('placeholder' => 'Username')) ?>
				        <?php endif; ?>
				
				        <?= $form->field($user, 'newPassword')->passwordInput(array('placeholder' => 'Password')) ?>
				
				        <?php /* uncomment if you want to add profile fields here
				        <?= $form->field($profile, 'full_name') ?>
				        */ ?>
				
				        <div class="form-group">
				            <div class="col-lg-12">
				                <?= Html::submitButton(Yii::t('user', 'Register'), ['class' => 'btn btn-primary btnLogin']) ?>
				            </div>
				        </div>
				
				        <?php ActiveForm::end(); ?>
				
				    <?php endif; ?>
						</div>
						<div class="panel-footer">
				                <?= Html::a(Yii::t('user', 'Login'), ["/dashboard"],['class' => 'btn btn-info btnLogin']) ?>
					</div>
					</div>
					
				
				</div>

			</div>           
            
            
        </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


