<?php

use app\modules\filemanager\assets\FilemanagerAsset;
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\filemanager\models\Mediafile */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->params['moduleBundle'] = FilemanagerAsset::register($this);
?>

<header id="header"><span class="glyphicon glyphicon-picture"></span> <?= Yii::t('filemanager', 'File manager') ?></header>

<div id="filemanager" data-url-info="<?= Url::to(['file/info']) ?>">
    <?=
    ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => '<div class="items">{items}</div>{pager}',
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
    return Html::a(
                    Html::img($model->getDefaultThumbUrl($this->params['moduleBundle']->baseUrl))
                    . '<span class="checked glyphicon glyphicon-check"></span>', '#mediafile', ['data-key' => $key]
    );
},
    ])
    ?>

    <div class="dashboard">
        <p><?= Html::a('<span class="glyphicon glyphicon-upload"></span> ' . Yii::t('filemanager', 'Upload manager'), ['file/uploadmanager'], ['class' => 'btn btn-default'])
    ?></p>
        <div id="fileinfo">

        </div>
    </div>
</div>