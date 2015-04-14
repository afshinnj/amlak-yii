<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\modules\dashboard\models\City;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('dashboard', 'Substates');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary" dir="rtl" id="Registration-location" data-form-name="Sub-State">
    <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
<?php if (Yii::$app->session->getFlash("State-success")): ?>
            <div class="alert alert-success">
                <button type="button" class="close pull-left" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p><?= Yii::$app->session->getFlash("State-success") ?></p>
            </div>
<?php endif; ?> 
        <hr>

        <p>
<?= Html::a('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;' . Yii::t('dashboard', 'Create Substate'), ['/Create-City'], ['class' => 'btn btn-success']) ?>
        </p>
    </div><!-- /.box-header -->
    <div class="box-body">
        <ul class="todo-list">
<?php foreach ($City as $row): ?>
                <li>
                    <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                    </span>
    <?= City::getCity($row['state_id']) . ' - ' . Html::encode($row['name']) ?>
                    <div class="tools pull-left">

                        <?=
                        Html::a('<i class="fa fa-edit"></i> ', ['/city-edit/' . $row['id']], [
                            'title' => Yii::t('yii', 'Update'),
                            //'data-confirm' => Yii::t('yii', 'Are you sure you want to edit this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ]);
                        ?>  
                        <?=
                        Html::a('<i class="fa fa-trash-o"></i>', ['/city-delete/' . $row['id']], [
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



