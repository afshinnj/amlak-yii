<?php
use dosamigos\fileupload\FileUploadUI;
use app\modules\filemanager\Module;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\filemanager\models\Mediafile */
$this->title = Yii::t('filemanager', 'Upload manager');
$this->params['breadcrumbs'][] = ['label' => Yii::t('filemanager', 'File Manager'), 'url' => ['file/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
	<div class="box box-primary" dir="rtl" id="Settings" data-form-name="File-Manager">
                <div class="box-header">
                  <i class="ion ion-images"></i>
                  <h3 class="box-title"><?= $this->title ?></h3>
                  </div><!-- /.box-header -->
                <div class="box-body">
               
					<div id="uploadmanager" dir="ltr">
					    
					    <?= FileUploadUI::widget([
					        'model' => $model,
					        'attribute' => 'file',
					        'url' => ['upload'],
					        'gallery' => false,
					    ]) ?>
					    
					</div>
                </div><!-- /.box-body -->

   </div>