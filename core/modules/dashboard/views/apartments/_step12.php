<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\dashboard\models\HomeDetails;

/* @var $this yii\web\View */
/* @var $model app\modules\dashboard\models\Apartments */
/* @var $form yii\widgets\ActiveForm */
?>



<?php $form = ActiveForm::begin(); ?>

<?= $form->errorSummary($model, array("class" => "alert alert-danger")) ?>


<fieldset>
    <legend><?= Yii::t('dashboard', 'Home General Info') ?></legend>
    <?= $this->render('_form_general', ['homeGeneralInfo' => $homeGeneralInfo, 'form' => $form]) ?>
</fieldset>

<fieldset>
    <legend><?= Yii::t('dashboard', 'Home Info') ?></legend>
    <div class="col-lg-6">

        <div class="row">
            <div class="col-xs-12 col-md-4 col-lg-4"><?= $form->field($model, 'metr')->textInput(['maxlength' => 255]) ?></div>
            <div class="col-xs-12 col-md-4 col-lg-4"><?= $form->field($model, 'Infrastructure', ['template' => '{label}{input}'])->textInput(['maxlength' => 255]) ?></div>
            <div class="col-xs-12 col-md-4 col-lg-4"><?= $form->field($model, 'rooms', ['template' => '{label}{input}'])->dropDownList(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']) ?></div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-4 col-lg-4"><?= $form->field($model, 'unit')->textInput(['maxlength' => 255]) ?></div>
            <div class="col-xs-12 col-md-4 col-lg-4"><?= $form->field($model, 'floors', ['template' => '{label}{input}'])->textInput(['maxlength' => 255]) ?></div>
            <div class="col-xs-12 col-md-4 col-lg-4"><?= $form->field($model, 'floor', ['template' => '{label}{input}'])->textInput(['maxlength' => 255]) ?></div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-4 col-lg-4"><?= $form->field($model, 'parking')->textInput(['maxlength' => 255]) ?></div>
            <div class="col-xs-12 col-md-4 col-lg-4"> <?= $form->field($model, 'tell')->textInput(['maxlength' => 255]) ?>	</div>
            <div class="ccol-xs-12 col-md-4 col-lg-4"><?= $form->field($model, 'units', ['template' => '{label}{input}'])->textInput(['maxlength' => 255]) ?></div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <?= $form->field($model, 'cabinets')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 5])->All(), 'title', 'title')) ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'wc')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 6])->All(), 'title', 'title')) ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'flooring')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 7])->All(), 'title', 'title')) ?>
            </div>
        </div>

    </div>

    <div class="col-lg-6">
        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($model, 'view')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 8])->All(), 'title', 'title')) ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($model, 'r_status')->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 9])->All(), 'title', 'title')) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4"><?= $form->field($model, 'price_metr', ['template' => '{label}{input}'])->textInput(['maxlength' => 255]) ?></div>
            <div class="col-lg-4"><?= $form->field($model, 'price_all', ['template' => '{label}{input}'])->dropDownList(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 4])->All(), 'title', 'title')) ?></div>
            <div class="col-lg-4"><?= $form->field($model, 'loan')->radioList(['ندارد', 'دارد']) ?></div> 
        </div>

        <div class="row"> 
            <div> <?= Html::activeLabel($model, 'old_home') ?></div>
            <div class="col-lg-12">

                <label>

                    <input type="radio" value="new" name="Apartments[old_home]" <?php if ($model['old_home'] == 'new') {
                    echo 'checked="checked"';
                } ?>> 
<?= Html::activeLabel($model, 'new') ?>
                </label>

                <label>
                    <input type="radio" value="old" name="Apartments[old_home]" <?php if ($model['old_home'] == 'old') {
    echo 'checked="checked"';
} ?>>
                    <?= Html::activeLabel($model, 'old') ?>
                </label>

                <label>
                    <input type="radio" value="restored" name="Apartments[old_home]" <?php if ($model['old_home'] == 'restored') {
                        echo 'checked="checked"';
                    } ?>>
                    <?= Html::activeLabel($model, 'restored') ?>
                </label>

                <label> 
<?php //$form->field($model, 'age', ['template' => '{input}'])->textInput(['maxlength' => 255])  ?>
                    <input type="radio" value="4" name="Apartments[old_home]" <?php if (is_numeric($model['old_home'])) {
    echo 'checked="checked"';
} ?>>
                    <input type="text"  name="Apartments[age]" style="padding: 6px 12px; width: 50px; text-align: center; border-color:#d2d6de; border: 1px solid #CCC" <?php if (is_numeric($model['old_home'])) {
    echo "value =" . $model['old_home'];
} ?>>
                    <?= Html::activeLabel($model, 'age') ?> 
                </label>

            </div>
        </div>
        <div class="row">
            <div><?= Html::activeLabel($model, 'location') ?></div>
            <div class="col-lg-12">

                <label>
                    <input type="radio" value="Northern" name="Apartments[location]" <?php if ($model['location'] == 'Northern') {
                        echo 'checked="checked"';
                    } ?>>
<?= Html::activeLabel($model, 'Northern') ?>
                </label>

                <label>
                    <input type="radio" value="Southern" name="Apartments[location]" <?php if ($model['location'] == 'Southern') {
    echo 'checked="checked"';
} ?>>
<?= Html::activeLabel($model, 'Southern') ?>
                </label>


                <label>
                    <input type="radio" value="Eastern" name="Apartments[location]" <?php if ($model['location'] == 'Eastern') {
    echo 'checked="checked"';
} ?>>
<?= Html::activeLabel($model, 'Eastern') ?>
                </label>


                <label> 
                    <input type="radio" value="'Western" name="Apartments[location]" <?php if ($model['location'] == 'Western') {
    echo 'checked="checked"';
} ?>>
<?= Html::activeLabel($model, 'Western') ?>
                </label>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12"><?= $form->field($model, 'description')->textarea(['maxlength' => 255]) ?></div>
    </div>


</fieldset>

<fieldset>
    <legend><?= Yii::t('dashboard', 'facilities') ?></legend>

<?= $form->field($model, 'facilities', ['template' => '{input}'])->checkboxlist(ArrayHelper::map(HomeDetails::find()->where(['details_id' => 11])->All(), 'title', 'title'), ['id' => 'facilities']); ?>

</fieldset>

<div class="row">
    <div class="col-lg-12 text-left">
<?= Html::submitButton($model->isNewRecord ? Yii::t('dashboard', 'Next Step') : Yii::t('dashboard', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

