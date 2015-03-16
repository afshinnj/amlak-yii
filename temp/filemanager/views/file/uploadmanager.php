<?php
use dosamigos\fileupload\FileUploadUI;
use app\modules\filemanager\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\filemanager\models\Mediafile */

?>

<header id="header"><span class="glyphicon glyphicon-upload"></span> <?= Module::t('main', 'Upload manager') ?></header>

<div id="uploadmanager">
    <p><?= Html::a('← ' . Module::t('main', 'Back to file manager'), ['file/filemanager']) ?></p>
    <?= FileUploadUI::widget([
        'model' => $model,
        'attribute' => 'file',
        'url' => ['upload'],
        'gallery' => false,
    ]) ?>
</div>