<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Faker\Provider\Image;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\models\LoginForm $model
 */

$this->title = Yii::t('user', 'Login');
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
		by calling the [[yii\base\Controller::render()|render()]] method in a controller, a layout will be applied
		to the rendering result. By default, the layout <code>@app/views/layouts/main.php</code> will be used. </p>
		
		<p>You may use a different layout by configuring either [[yii\base\Application::layout]] or [[yii\base\Controller::layout]].
		The former governs the layout used by all controllers, while the latter overrides the former for individual controllers.
		For example, the following code makes the <code>post</code> controller to use <code>@app/views/layouts/post.php</code> as the layout
		when rendering its views. Other controllers, assuming their <code>layout</code> property is untouched, will still use the default
		<code>@app/views/layouts/main.php</code> as the layout.</p>
	</div>
</div>

</div>

<div class="col-lg-4">
<div class="panel panel-default ">

	<div class="panel-body">
		<div style="text-align: center; margin-bottom: 20px;" >
			<?= Html::img('@web/images/avatar.png',['class' =>'img-circle','width'=>'150px']);?>
		</div>
		<?php $form = ActiveForm::begin([
			'id' => 'login-form',
			'options' => ['class' => 'form-horizontal'],
			'fieldConfig' => [
				'template' => "<div class=\"col-lg-12\">{input}{error}</div>",
			],
	
		]); ?>

		<?= $form->field($model, 'username')->textInput(array('placeholder' => 'Email'));?>
		<?= $form->field($model, 'password')->passwordInput(array('placeholder' => 'Password')) ?>


				<?= Html::submitButton(Yii::t('user', 'Login'), ['class' => 'btn btn-primary btnLogin']) ?>
		<?php ActiveForm::end(); ?>
	</div>
	<div class="panel-footer text-center">
	<?= Html::a(Yii::t("user", "Register"), ["/user/register"],['class' => 'btn btn-info btnLogin']) ?>
		<br>
			<?= Html::a(Yii::t("user", "Forgot password") . "?", ["/user/forgot"]) ?><br>
			<?= Html::a(Yii::t("user", "Resend confirmation email"), ["/user/resend"]) ?>

            	
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

