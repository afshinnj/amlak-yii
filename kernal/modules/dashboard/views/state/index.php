<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use yii\helpers\Url;
use app\modules\dashboard\models\Substate;
use yii\helpers\ArrayHelper;
use app\modules\dashboard\models\State;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('dashboard','States');
$this->params['breadcrumbs'][] = Yii::t('dashboard',$this->title);
?>


 	<div class="box box-primary" dir="rtl">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
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
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;' . Yii::t('dashboard','Create State'), ['/Create-State'], ['class' => 'btn btn-success']) ?>
    </p>         
                  </div><!-- /.box-header -->
                <div class="box-body">
					<ul class="todo-list ui-sortable">
                	<?php foreach ($State as $row):?>
                	<li>
                		<span class="handle ui-sortable-handle">
	                        <i class="fa fa-ellipsis-v"></i>
                       </span>
                		<?= Html::encode($row['name']);?>
                		<div class="tools">
             		
                		<?= Html::a('<i class="fa fa-edit"></i> ',['/state-edit/'.$row['id']], [
				           'title' => Yii::t('yii', 'Update'),
				           //'data-confirm' => Yii::t('yii', 'Are you sure you want to edit this item?'),
				           'data-method' => 'post',
				           'data-pjax' => '0',
						]);
                		?>  
                 		<?= Html::a('<i class="fa fa-trash-o"></i>', ['/state-delete/'.$row['id']], [
                				'title' => Yii::t('yii', 'Delete'),
                				'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                				'data-method' => 'post',
                				'data-pjax' => '0',
                				'style' => 'margin-right: 10px',
                		]);
						?>               		
                		</div>


                	</li>
                	<?php endforeach;?>
                </ul>
                </div><!-- /.box-body -->
   </div> 
	<div class="text-center">
		<?= LinkPager::widget(['pagination' => $pages,]);?>
	</div>			
		
	
</div>

