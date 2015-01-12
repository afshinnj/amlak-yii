<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('panel','Substates');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="substate-index">
    <?php if ($flash = Yii::$app->session->getFlash("State-success")): ?>
        <div class="alert alert-success">
        <button type="button" class="close pull-left" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
            <p><?= $flash ?></p>
        </div>

    <?php endif; ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('panel','Create Substate'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
  <div class="table-responsive">
		<table class="table table-striped table-bordered">
		<thead>
		<tr>
			<th class="text-right"><?= Yii::t('panel','Citys Name')?></th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		</thead>
			<?php foreach ($City as $row):?>
				<tr>
					<td><?= $row['name']?></td>
					<td align="center" width="50px">
						<?= Html::a('<span class="glyphicon glyphicon-edit"></span>',['/city-edit/'.$row['id']], [
				                    'title' => Yii::t('yii', 'Update'),
				                    //'data-confirm' => Yii::t('yii', 'Are you sure you want to edit this item?'),
				                   'data-method' => 'post',
				                   'data-pjax' => '0',
								]);
						?>
					</td>
					<td align="center" width="50px">
						<?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['/city-delete/'.$row['id']], [
		                    'title' => Yii::t('yii', 'Delete'),
		                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
		                    'data-method' => 'post',
		                    'data-pjax' => '0',
		                    'class' => 'red',
		                ]);
						?>
					</td>
				</tr>
			<?php endforeach;?>
		</table>
	</div>
	<div class="text-center">
		<?= LinkPager::widget(['pagination' => $pages,]);?>
	</div>			
		
</div>
