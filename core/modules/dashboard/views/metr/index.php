<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('dashboard', 'Metrs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-primary" dir="rtl" id="Registration-variable" data-form-name="Metr-Groups">

    <div class="box-header">
        <i class="ion ion-clipboard"></i>
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
    </div><!-- /.box-header -->
    <?php if (Yii::$app->session->getFlash("type-success")): ?>
        <div class="alert alert-success">
            <button type="button" class="close pull-left" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <p><?= $flash ?></p>
        </div>

    <?php endif; ?>
    <div class="box-body">
        <p>
            <?= Html::a(Yii::t('dashboard', 'Create Metr'), ['/Metr-Create'], ['class' => 'btn btn-success']) ?>
        </p>
        <ul class="todo-list">
            <?php foreach ($Metr as $row): ?>

                <li><?= $row['title'] ?>
                    <div class="tools pull-left">
                        <?=
                        Html::a('<i class="fa fa-edit"></i>', ['/Metr-edit/' . $row['id']], [
                            'title' => Yii::t('yii', 'Update'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ]);
                        ?>
                        <?=
                        Html::a('<i class="fa fa-trash-o"></i>', ['/Metr-delete/' . $row['id']], [
                            'title' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                            'class' => 'red',
                        ]);
                        ?>
                    </div>
                </li>
<?php endforeach; ?>
        </ul>
    </div><!-- /.box-body -->
    <div class="box-footer clearfix no-border" dir="ltr">
<?= LinkPager::widget(['pagination' => $pages,]); ?>
    </div>

</div>
