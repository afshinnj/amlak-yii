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
		<div class="panel-title">Using Layouts</div>
	</div>
	<div class="panel-body">
			<p>As described in the <a href="#rendering-in-controllers">Rendering in Controllers</a> subsection, when you render a view
		by calling the [[yii\base\Controller::render()|rendpplied
		to the rendering result. By default, the layout <code>@app/views/layouts/main.php</code> will be used. </p>
		
		<p>You may use a different layout by configuring either [[yii\base\Application::layout]] or [[yii\base\Controller::layout]].
		The former governs the layout used by all controllers, while the latter overrides the former for individual controllers.
		For example, the following code makes the <code>post</code> controller to use <code>@app/views/layouts/post.php</code> as the layout
		when rendering its views. Other controllers, assuming their <code>layout</code> property is untouched, will still use the default
		<code>@app/views/layouts/main.php</code> as the layout.</p>
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
				                <?= Html::a(Yii::t('user', 'Login'), ["/user/login"],['class' => 'btn btn-info btnLogin']) ?>
					</div>
					</div>
					
				
				</div>

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


