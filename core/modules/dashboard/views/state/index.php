<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('dashboard', 'States');
$this->params['breadcrumbs'][] = Yii::t('dashboard', $this->title);
?>


<div class="box box-primary"  dir="rtl" id="Registration-location" data-form-name="State">
    <div class="box-header ui-sortable-handle" style="cursor: move;">
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

    </div><!-- /.box-header -->
    <div class="box-body">
        <p>
            <?= Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;' .
                    Yii::t('dashboard', 'Create State'), ['/Create-State'], ['class' => 'btn btn-success'])
            ?>
        </p>   
        <ul class="todo-list ui-sortable">
            <?php foreach ($State as $row): ?>
                <li>
                    <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                    </span>
                    <?= Html::encode($row['name']); ?>
                    <div class="tools pull-left">

                        <?=
                        Html::a('<i class="fa fa-edit"></i> ', ['/state-edit/' . $row['id']], [
                            'title' => Yii::t('yii', 'Update'),
                            //'data-confirm' => Yii::t('yii', 'Are you sure you want to edit this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ]);
                        ?>  
                        <?=
                        Html::a('<i class="fa fa-trash-o"></i>', ['/state-delete/' . $row['id']], [
                            'title' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                            'style' => 'margin-right: 10px',
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



