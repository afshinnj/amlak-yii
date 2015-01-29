<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use yii\helpers\Url;
use app\modules\panel\models\Substate;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('panel','States');
$this->params['breadcrumbs'][] = Yii::t('panel',$this->title);
?>

<div class="state-index">
    <?php if ($flash = Yii::$app->session->getFlash("State-success")): ?>
        <div class="alert alert-success">
        <button type="button" class="close pull-left" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
            <p><?= $flash ?></p>
        </div>

    <?php endif; ?>
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;' . Yii::t('panel','Create State'), ['/Create-State'], ['class' => 'btn btn-success']) ?>
    </p>
    <hr>
    <div class="table-responsive">
		<table class="table table-striped table-bordered">
		<thead>
		<tr>
			<th class="text-right"><?= Yii::t('panel','States Name')?></th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		</thead>
			<?php foreach ($State as $row):?>
				<tr>
					<td><?= $row['name']?></td>
					<td align="center" width="50px">
						<?= Html::a('<span class="glyphicon glyphicon-edit"></span>',['/state-edit/'.$row['id']], [
				                    'title' => Yii::t('yii', 'Update'),
				                    //'data-confirm' => Yii::t('yii', 'Are you sure you want to edit this item?'),
				                   'data-method' => 'post',
				                   'data-pjax' => '0',
								]);
						?>
					</td>
					<td align="center" width="50px">
						<?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['/state-delete/'.$row['id']], [
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
 	      
<select id ="state" class="form-control">
<?php foreach ($State as $row):?>
<option value="<?= $row['id']?>"><?= $row['name']?></option>
<?php endforeach;?>
</select>
<select id ="city" class="form-control"></select>
<select id ="area" class="form-control"></select>
<?php 
$js = <<<JS
$('#state').change(function(){
		var id = $('#state').val();
		var formURL = 'http://localhost/amlak/panel/state/subcat';
		var postData = {'id' : id};
		$.ajax({
			url: formURL,
			type: 'post',
			data: postData,
			success:function(data)
					{
						$("#city").html('');
						$("#city").html(data);
			    	}
		 });	

});
$('#city').change(function(){
		var id = $('#city').val();
		var formURL = 'http://localhost/amlak/panel/state/subcity';
		var postData = {'id' : id};
		$.ajax({
			url: formURL,
			type: 'post',
			data: postData,
			success:function(data)
					{
						$("#area").html('');
						$("#area").html(data);
			    	}
		 });	

})


JS;
$this->registerJs($js)

?>