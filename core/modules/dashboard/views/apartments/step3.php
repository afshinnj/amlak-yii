<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\Apartments */
/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\Apartments */
/* @var $form yii\widgets\ActiveForm */
$this->title = Yii::t('dashboard', 'Create Apartments');
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard', 'Apartments'), 'url' => ['/apartment-step2']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="box box-primary" dir="rtl" id="Registration-home" data-form-name="Apartments">
    <div class="box-header">
        <i class="ion ion-edit"></i>
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        <hr>
    </div><!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-4" style="background-color:#eee">
                    <h3><i class="ion ion-checkmark-circled text-success"></i>&nbsp;<?= Yii::t('dashboard', 'Step 1') ?>
                        <i class="ion ion-chevron-left pull-left" style="margin-left: 20px"></i>
                        <br><small><?= Yii::t('dashboard', 'General View of the property') ?></small>
                    </h3>
                </div>

                <div class="col-lg-4" style="background-color:#eee">
                    <h3> <i class="ion ion-checkmark-circled text-success"></i>&nbsp;<?= Yii::t('dashboard', 'Step 2') ?>
                        <i class="ion ion-chevron-left pull-left" style="margin-left: 20px"></i>
                        <br><small><?= Yii::t('dashboard', 'Home Image and Positioning') ?></small>
                    </h3>
                </div>

                <div class="col-lg-4" style="background-color:#eee">
                    <h3><i class="ion ion-checkmark-circled text-success"></i>&nbsp;<?= Yii::t('dashboard', 'Step 3') ?>
                        <i class="ion ion-chevron-left pull-left" style="margin-left: 20px"></i>
                        <br><small><?= Yii::t('dashboard', 'Finish Register') ?></small>
                    </h3>

                </div>
            </div>
        </div>
    </div>
    
    <div class="box-body">
    </div>

</div>
