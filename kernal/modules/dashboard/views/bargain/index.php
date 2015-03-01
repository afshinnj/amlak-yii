<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('dashboard','Bargain Types');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bargain-type-index">
    <?php if ($flash = Yii::$app->session->getFlash("State-success")): ?>
        <div class="alert alert-success">
        <button type="button" class="close pull-left" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
            <p><?= $flash ?></p>
        </div>

    <?php endif; ?>
    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a(Yii::t('dashboard',Yii::t('dashboard','Create Bargain Type')), ['/bargain-create'], ['class' => 'btn btn-success']) ?>
    </p>
  <div class="table-responsive">
		<table class="table table-striped table-bordered">
		<thead>
		<tr>
			<th class="text-right"><?= Yii::t('dashboard','Bargain Types')?></th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		</thead>
			<?php foreach ($Bargain as $row):?>
				<tr>
					<td><?= $row['title']?></td>
					<td align="center" width="50px">
						<?= Html::a('<span class="glyphicon glyphicon-edit"></span>',['/bargain-edit/'.$row['id']], [
				                    'title' => Yii::t('yii', 'Update'),
				                    //'data-confirm' => Yii::t('yii', 'Are you sure you want to edit this item?'),
				                   'data-method' => 'post',
				                   'data-pjax' => '0',
								]);
						?>
					</td>
					<td align="center" width="50px">
						<?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['/bargain-delete/'.$row['id']], [
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
