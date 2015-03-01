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
    
        <div class="container">
		 	<div class="row">
		 		<div class="col-lg-8">
		 				<div class="box box-primary" dir="rtl">
			                <div class="box-header">
			                  <i class="ion ion-clipboard"></i>
			                  <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
			                  </div><!-- /.box-header -->
			                <div class="box-body">
									<?= $page['text']?>
			                </div><!-- /.box-body -->
			 				</div>
		 		</div>
		 		<div class="col-lg-4">
		 				<div class="box box-primary" dir="rtl">
			                <div class="box-header">
			                  <i class="ion ion-locked"></i>
			                  <h3 class="box-title"></h3>
			                  </div><!-- /.box-header -->
			                <div class="box-body">
			<div style="text-align: center; margin-bottom: 20px;" >
								<?= Html::img('@web/images/avatar.png',['class' =>'img-circle','width'=>'120px']);?>
								<h4><?= Yii::t('fa-IR','Administration')?></h4>
								<small class="text-muted"><?= Yii::t('fa-IR','Please enter your login details.')?></small>
							</div>
				
						<?php $form = ActiveForm::begin(['id' => 'login-form','options' => ['class' => 'form-horizontal'],
										'fieldConfig' => [
											'template' => "<div class=\"col-lg-12\">{input}{error}</div>",
										],
						]); ?>
				
						       <?= $form->field($model, 'username')->textInput(array('placeholder' => 'Email'));?>
						       <?= $form->field($model, 'password')->passwordInput(array('placeholder' => 'Password')) ?>
							  <?= Html::submitButton(Yii::t('user', 'Login'), ['class' => 'btn btn-primary btnLogin']) ?>
						<?php ActiveForm::end(); ?>
					<div class="box-footer text-center">
						<?= Html::a(Yii::t("user", "Register"), ["/user/register"],['class' => 'btn btn-info btnLogin']) ?>
						<br>
							<?= Html::a(Yii::t("user", "Forgot password") . "?", ["/user/forgot"]) ?><br>
							<?= Html::a(Yii::t("user", "Resend confirmation email"), ["/user/resend"]) ?>
				  	
					</div>
			                </div><!-- /.box-body -->
			 				</div>
		 		</div>

			</div>   <!-- row -->          
        </div> <!-- container -->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

