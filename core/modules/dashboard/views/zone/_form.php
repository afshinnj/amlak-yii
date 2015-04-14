<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\dashboard\models\City;
use app\modules\dashboard\models\State;

/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\Area */
/* @var $form yii\widgets\ActiveForm */
?>



<?php $form = ActiveForm::begin(); ?>
<div class="box-body">
    <div class="col-lg-4">
        <?= $form->field($model, 'name')->textInput(['maxlength' => 50], ['id' => 'area']) ?>
    </div>

    <div class="col-lg-4">
        <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(City::find()->where(['city' => 1])->All(), 'id', 'name'), ['id' => 'city']); ?>
    </div>

    <div class="col-lg-4">
        <?= $form->field($model, 'state_id')->dropDownList(ArrayHelper::map(State::find()->where(['state' => 1])->All(), 'id', 'name'), ['id' => 'state']); ?>
    </div>
</div>
<div class="box-footer clearfix no-border">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('dashboard', 'Create') : Yii::t('dashboard', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
<?= $this->registerJs(Yii::$app->City->js()); ?>