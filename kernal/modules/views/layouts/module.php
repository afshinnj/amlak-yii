<?php
use yii\helpers\Html;
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
<body class="panelbody">

<?php $this->beginBody() ?>
    <div class="wrap">
    
<?php
	if (!empty(Yii::$app->user) && Yii::$app->user->can("admin")):
	  		 echo $this->render("admin.php");
	  		 $url = '/panel';
	elseif (!empty(Yii::$app->user) && Yii::$app->user->can("user")):
	  		echo  $this->render("user.php");
	  		 $url = '/dashbord';
	endif
?>
        

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'homeLink' => [
		            'label' => Yii::t('yii','Home'),  // required
		         	'url' => [$url],      // optional, will be processed by Url::to()
		            ],
            ]) ?>
            <?= $content ?>
            
        </div>
    </div>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
