<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use yii\helpers\Url;
use app\modules\dashboard\models\Zone;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('dashboard','Zones');
$this->params['breadcrumbs'][] = $this->title;
?>
	<div class="box box-primary" li="Zone" dir="rtl" id="Registration-location">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            <?php if ($flash = Yii::$app->session->getFlash("State-success")): ?>
		        <div class="alert alert-success">
		        <button type="button" class="close pull-left" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
		            <p><?= $flash ?></p>
		        </div>
		    <?php endif; ?> 
			<hr>

    <p>
 <?= Html::a('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;' . Yii::t('dashboard','Create Zone'), ['/zone-create'], ['class' => 'btn btn-success']) ?>    
 </p>
      </div><!-- /.box-header -->
                <div class="box-body">
					<ul class="todo-list ui-sortable">
                	<?php foreach ($Zone as $row):?>
                	<li>
                		<span class="handle">
	                        <i class="fa fa-ellipsis-v"></i>
                       </span>
                		<?=Html::encode($row['name'] .' - '.  Zone::getCity($row['city_id'])  .' - '. Zone::getCity($row['state_id'])) ?>
                		<div class="tools">
             		
                		<?= Html::a('<i class="fa fa-edit"></i> ',['/zone-edit/'.$row['id']], [
				           'title' => Yii::t('yii', 'Update'),
				           //'data-confirm' => Yii::t('yii', 'Are you sure you want to edit this item?'),
				           'data-method' => 'post',
				           'data-pjax' => '0',
						]);
                		?>  
                 		<?= Html::a('<i class="fa fa-trash-o"></i>', ['/zone-delete/'.$row['id']], [
                				'title' => Yii::t('yii', 'Delete'),
                				'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                				'data-method' => 'post',
                				'data-pjax' => '0',
                				'style' => 'margin-right: 5px',
                		]);
						?>               		
                		</div>


                	</li>
                	<?php endforeach;?>
                </ul>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                 <?= LinkPager::widget(['pagination' => $pages,]);?>
                </div>
                
	</div>

