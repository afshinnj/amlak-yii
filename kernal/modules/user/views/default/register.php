<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
use yii\captcha\Captcha;

AppAsset::register ( $this );
$this->title = Yii::t ( 'user', 'Register' );
$this->params ['breadcrumbs'] [] = $this->title;
?>

<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags()?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head()?>
</head>
<body class="register-page"  style="padding-top: 50px;">

<?php $this->beginBody()?>
    <div class="wrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-8" dir="rtl">
					<div class="box box-primary" dir="rtl">
						<div class="box-header">
							<i class="ion ion-clipboard"></i>
							<h3 class="box-title"><?= Html::encode($this->title) ?></h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
									<?= $page['text']?>
			                </div>
						<!-- /.box-body -->
					</div>
				</div>

				<div class="col-lg-4">
					<div class="box box-primary" dir="rtl">
						<div class="box-body">
						
					<?php if ($flash = Yii::$app->session->getFlash("Register-success")): ?>
				        <div class="alert alert-success">
								<p><?= $flash ?></p>
							</div>
				    <?php else: ?>
				
				        <p><?= Yii::t("user", "Please fill out the following fields to register:") ?></p>
				
				        <?php
						
						$form = ActiveForm::begin ( [ 
								'id' => 'register-form',
								'options' => [ 
										'class' => 'form-horizontal' 
								],
								'enableAjaxValidation' => true 
						] );
						?>
				
				        <?php if (Yii::$app->getModule("user")->requireEmail): ?>
				            <?= $form->field($user, 'email', ['template' => '<div class="col-lg-12 has-feedback"><span class="glyphicon glyphicon-envelope form-control-feedback"></span>{input}{error}{hint}</div>',])->textInput(array('placeholder' => 'Email'))?>
				        <?php endif; ?>

				        <?php if (Yii::$app->getModule("user")->requireUsername): ?>
				            <?= $form->field($user, 'username',['template' => '<div class="col-lg-12 has-feedback"><span class="glyphicon glyphicon-user form-control-feedback"></span>{input}{error}{hint}</div>',])->textInput(array('placeholder' => 'Username'))?>
				        <?php endif; ?>
				        

						<?= $form->field($user, 'newPassword',['template' => '<div class="col-lg-12 has-feedback"><span class="glyphicon glyphicon-lock form-control-feedback"></span>{input}{error}{hint}</div>',])->passwordInput(array('placeholder' => 'Password'))?>
				        <?= $form->field($user, 'newPasswordConfirm',['template' => '<div class="col-lg-12 has-feedback"><span class="glyphicon glyphicon-log-in form-control-feedback"></span>{input}{error}{hint}</div>',])->passwordInput(array('placeholder' => 'Retype password'))?>
				

				        <div class="row">
				        	<div class="col-xs-4" >
				                <?= Html::submitButton(Yii::t('user', 'Register'), ['class' => 'btn btn-primary btn-block btn-flat'])?>
				            </div>
				            
				        	<div class="col-xs-8">
				        		  <div class="checkbox icheck">
					                  <?= $form->field($user,'check')->checkbox()?>
					              </div> 
					                
				        	</div>
		
						</div>
				
				        <?php ActiveForm::end(); ?>
				
				    <?php endif; ?>

							
					<div class="box-footer text-center">
				  	 <?= Html::a(Yii::t('user', 'Login'), ["/login"],['class' => 'btn btn-info btnLogin'])?>
					</div>
						</div>
						<!-- /.box-body -->
					</div>
				</div>


			</div>


		</div>
	</div>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>


