<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('dashboard','Pages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index" dir="rtl">
    <?php if ($flash = Yii::$app->session->getFlash("State-success")): ?>
        <div class="alert alert-success">
        <button type="button" class="close pull-left" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
            <p><?= $flash ?></p>
        </div>

    <?php endif; ?>



	<div class="box box-primary" >
                <div class="box-header ui-sortable-handle">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                  
                  </div><!-- /.box-header -->
                <div class="box-body">
		
                <ul class="todo-list">
                	<?php foreach ($Pages as $row):?>
                	<li>
                		<span class="handle ui-sortable-handle">
	                        <i class="fa fa-ellipsis-v"></i>
	                        <i class="fa fa-ellipsis-v"></i>
                       </span>
                		<?= Html::encode($row['title']);?>
                				<?= Html::a('<span class="glyphicon glyphicon-edit pull-left"></span>',['/page-edit/'.$row['id']], [
				                    'title' => Yii::t('yii', 'Update'),
				                    //'data-confirm' => Yii::t('yii', 'Are you sure you want to edit this item?'),
				                   'data-method' => 'post',
				                   'data-pjax' => '0',
								]);
						?>
                	</li>
                	<?php endforeach;?>
                </ul>
                
                </div><!-- /.box-body -->

   </div>
</div>