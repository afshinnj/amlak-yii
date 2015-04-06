<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('dashboard','Backup');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary" dir="rtl" id="Settings" data-form-name="Backup">
                <div class="box-header">
                  <i class="fa fa-jsfiddle"></i>
                  <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                  </div><!-- /.box-header -->
                <div class="box-body">
		            <?php if ($flash = Yii::$app->session->getFlash("success")): ?>
				        <div class="alert alert-success">
				        <button type="button" class="close pull-left" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
				            <p><?= $flash ?></p>
				        </div>
				    <?php endif; ?> 
                	 <?php if ($flash = Yii::$app->session->getFlash("danger")): ?>
				        <div class="alert alert-danger">
				        <button type="button" class="close pull-left" data-dismiss="alert" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
				            <p><?= $flash ?></p>
				        </div>
				    <?php endif; ?> 
                <?= Html::a(Yii::t('dashboard','Backup'),['/create'],['class'=>'btn btn-primary'])?>
                <?= Html::a(Yii::t('dashboard','Upload'),['/backup-upload'],['class'=>'btn btn-primary'])?>
                <hr>
                <ul class="todo-list">
	                <?php foreach($dataProvider as $row): ?>
	                <li>
	                	<i class="fa fa-database"></i> <?= $row['name']?><br> 
	                	<i class="fa fa-clock-o"></i> <?= $row['modified_time']?>
	                	<div class="tools pull-left">
						<?= Html::a('<i class="fa fa-undo fa-fw"></i>',['/backup-restore/'.$row['id']], [
				                    'title' => Yii::t('yii', 'Update'),
				                   'data-method' => 'post',
				                   'data-pjax' => '0',
				                   'style' => 'margin-right: 5px',
								]);
						?>
						<?= Html::a('<i class="fa fa-download"></i>',['/backup-download/'.$row['id']], [
				                    'title' => Yii::t('yii', 'Update'),
				                   'data-method' => 'post',
				                   'data-pjax' => '0',
				                   'style' => 'margin-right: 5px',
								]);
						?>
						<?= Html::a('<i class="fa fa-trash-o"></i>', ['/backup-delete/'.$row['id']], [
		                    'title' => Yii::t('yii', 'Delete'),
		                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
		                    'data-method' => 'post',
		                    'data-pjax' => '0',
		                    'class' => 'red',
		                    'style' => 'margin-right: 5px',
		                ]);
						?>
						</div>
	                </li>
					<?php endforeach;?>
				</ul>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">

				</div>
   </div>