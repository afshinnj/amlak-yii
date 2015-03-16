<?php

use app\modules\filemanager\Module;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\helpers\Html;

use app\modules\filemanager\assets\FilemanagerAsset;

/* @var $this yii\web\View */

$this->title = Yii::t('filemanager', 'Files');
$this->params['breadcrumbs'][] = ['label' => Yii::t('filemanager', 'File Manager')];
$this->params['moduleBundle'] = FilemanagerAsset::register($this);
?>
	<div class="box box-primary" id="Settings" data-form-name="File-Manager">
                <div class="box-header" dir="rtl">
                  <i class="ion ion-images"></i>
                  <h3 class="box-title"><?= $this->title ?></h3>
                  </div><!-- /.box-header -->
                <div class="box-body">
                	 <p class="text-right"><?= Html::a('<span class="glyphicon glyphicon-upload"></span> ' . Yii::t('filemanager', 'Upload manager'),
					                ['/media-upload'], ['class' => 'btn btn-default']) ?></p>
					<div style="margin-top: 5px; border-top: 1px solid #EEE; padding-top: 10px;" id="filemanager" data-url-info="<?= Url::to(['file/info']) ?>">
					
					    <?php echo ListView::widget([
					        'dataProvider' => $dataProvider,
					        'layout' => '<div class="items col-lg-12 clearfix">{items}</div>{pager}',
					        'itemOptions' => ['class' => 'item col-lg-2 col-xs-7  col-sm-4'],
					        'itemView' => function ($model, $key, $index, $widget) {
					                return Html::a(
					                    Html::img($model->getDefaultThumbUrl($this->params['moduleBundle']->baseUrl),['class' => 'img-rounded'])
					                    . '<span class="checked glyphicon glyphicon-check"></span>',
					                    '#mediafile',
					                    ['data-key' => $key, 'data-toggle'=>"modal", 'data-target'=>"#DetailsPhoto"]
					                );
					            },
					    ]) ?>
					




					</div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                 
                </div>
   </div>

						<!-- Modal -->
						<div class="modal fade" id="DetailsPhoto" tabindex="-1" role="dialog" aria-labelledby="DetailsPhoto" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header" dir="rtl">
						        <button type="button" class="close pull-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="DetailsPhotoLabel"><i class="ion ion-image"></i> <?= Yii::t('filemanager','Details Photo')?></h4>
						      </div>
						      <div class="modal-body" id="fileinfo">
	
						      </div>
						    </div>
						  </div>
						</div>
						<!-- end Model -->

