<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\modules\dashboard\models\Apartments;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('dashboard', 'Apartments');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary" dir="rtl" id="Registration-home" data-form-name="Apartments">
    <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        <?php if (Yii::$app->session->getFlash("State-success")): ?>
            <div class="alert alert-success">
                <button type="button" class="close pull-left" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p><?= $flash ?></p>
            </div>
        <?php endif; ?> 
        <hr>
        <p>
            <?= Html::a(Yii::t('dashboard', 'Create Apartments'), ['/apartment-create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div><!-- /.box-header -->
    <div class="box-body">
        <ul class="todo-list">
            <?php foreach ($apartments as $row): ?>
                <li>
                    <span class="">
                        <?= Apartments::getApartmentsCode($row['home_general_Info_id']) ?>
                    </span>
                    <span class="">
                        <?= Apartments::getUser($row['user_id']) ?>
                    </span>
                    <div class="tools pull-left">

                        <?=
                        Html::a('<i class="fa fa-edit"></i> ', ['/apartment-edit/' . $row['id']], [
                            'title' => Yii::t('yii', 'Update'),
                            //'data-confirm' => Yii::t('yii', 'Are you sure you want to edit this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ]);
                        ?>  
                        <?=
                        Html::a('<i class="fa fa-trash-o"></i>', ['/apartment-delete/' . $row['id']], [
                            'title' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                            'style' => 'margin-right: 5px',
                        ]);
                        ?>               		
                    </div>


                </li>
            <?php endforeach; ?>
        </ul>
    </div><!-- /.box-body -->
    <div class="box-footer clearfix no-border">
        <?= LinkPager::widget(['pagination' => $pages,]); ?>
    </div>
</div>
