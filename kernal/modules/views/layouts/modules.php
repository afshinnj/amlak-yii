<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
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
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
        if(!Yii::$app->user->isGuest):  
        	         
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
            	'encodeLabels' => false,
                'items' => [
                    ['label' => Yii::t('fa-IR','Dashbord'). ' '. '<spam class="glyphicon glyphicon-dashboard"></spam>', 'url' => ['/dashbord']],
                    
                ],
            ]);

            echo Nav::widget([
            		'options' => ['class' => 'navbar-nav navbar-right  text-right'],
            		'items' => [
            				[
            				'label' => Yii::t('fa-IR','Home'),
            				'items' =>
            						[
	            						['label'=>Yii::t('fa-IR','Registration Home'),'url' =>['/change-password']],
	            						['label'=>Yii::t('fa-IR','House request'),'url' =>['/change-profile']],
            						],
            				],
            		],
            ]);

            echo Nav::widget([
            		'options' => ['class' => 'navbar-nav navbar-right  text-right'],
            		'items' => [
            				[
            				'label' => Yii::t('fa-IR','Home'),
            				'items' =>
            						[
            							['label'=>Yii::t('fa-IR','Registration Home'),'url' =>['/change-password']],
            							['label'=>Yii::t('fa-IR','House request'),'url' =>['/change-profile']],
            						],
            				],
            		],
            ]);
			echo Nav::widget([
			'options' => ['class' => 'navbar-nav navbar-right  text-right'],
					'items' => [
					[
						'label' => Yii::t('fa-IR','User'),
						'items' =>
						 [
							['label'=>Yii::t('fa-IR','Change Password'),'url' =>['/change-password']],
							['label'=>Yii::t('fa-IR','Change Profile'),'url' =>['/change-profile']],
						 	['label'=>Yii::t('fa-IR','Change Avatar'),'url' =>['/change-avatar']],
						 ],
					],
					],
				]);

            echo Nav::widget([
            		'options' => ['class' => 'navbar-nav navbar-left  text-right'],
					'encodeLabels' => false,
            		'items' => [
            			['label' =>'<span class="glyphicon glyphicon-log-out"></span>' .' '. Yii::t("fa-IR", "logout  [ {displayName} ]", ["displayName" =>Yii::$app->user->identity->username]),
            			'url' => ['/logout'],
            			'linkOptions' => ['data-method' => 'post']],
            			
            		],
            		]);
            endif;
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'homeLink' => [
		            'label' => Yii::t('yii','Home'),  // required
		         	'url' => 'dashbord',      // optional, will be processed by Url::to()
		            ],
            ]) ?>
            <?= $content ?>
            
        </div>
    </div>

    <footer class="footer text-center">
        <div class="container">
            <p>&copy; My Company <?= date('Y') ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
