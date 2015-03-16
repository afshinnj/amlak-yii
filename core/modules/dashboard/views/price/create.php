<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\TotalPrice */

$this->title = Yii::t('dashboard','Create Price');
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard','Total Prices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary" dir="rtl" id="Registration-variable" data-form-name="Total-Price">
                <div class="box-header">
                 	 <i class="ion ion-compose"></i>
                 	 <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                </div><!-- /.box-header -->


    <?= $this->render('_form', [ 'model' => $model,]) ?>
</div>
