<?php

/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\Apartments */

$this->title = Yii::t('dashboard', 'Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('dashboard', 'Apartments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('dashboard', 'Update');
?>


<?=

$this->render('_form', [
    'model' => $model,
    'homeGeneralInfo' => $homeGeneralInfo,
])
?>


