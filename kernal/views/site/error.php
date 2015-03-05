<?php

use yii\helpers\Html;
use app\assets\AppAsset;
$this->title = $name;



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
<div class="site-error" dir="rtl">

        <!-- Main content -->
        <section class="content text-center">

          <div class="error-page">
           
            <div class="error-content">
              <h3><i class="fa fa-warning text-yellow"></i> <?= nl2br(Html::encode($message)) ?> <p class="headline text-yellow"> 404</p></h3>
            </div><!-- /.error-content -->
          </div><!-- /.error-page -->
        </section><!-- /.content -->
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
