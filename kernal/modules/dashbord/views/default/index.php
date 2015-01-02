<?php 
use yii\helpers\Html;
?>
<div class="dashbord-default-index">
	<div class="col-lg-4">
	    <div class="panel panle-info">
	    	<div class="panel-body">
	    		<?= Html::img(Yii::getAlias('@web').'/uploads/avatars/'. Yii::$app->user->identity->profile->avatar,['class'=>'img-thumbnail pull-left','width'=>'150px;'])?>

	    		<span class="glyphicon glyphicon-user"></span> : <?= Yii::$app->user->identity->username?><br>
	    		<span class="glyphicon glyphicon-envelope"></span> : <?= Yii::$app->user->identity->email?><br>
	    		<br>
	    		<br>
	    		<br>

     			<span class="glyphicon glyphicon-log-out"></span> : 
     			<?= Html::a(Yii::t("fa-IR", "logout"), ['/logout'], [
		            'class' => '',
		            'data' => [
		                //'confirm' => Yii::t('user', 'Are you sure you want to delete this item?'),
		                'method' => 'post',
		            ],
		        ]) ?>
	    	</div>
	    </div>
    </div>
    
    



</div>
