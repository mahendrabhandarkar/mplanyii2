<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\ProductService;
use common\models\ProductMaster;
use common\models\AdminUser;
use kartik\select2\Select2;
use yii\jui\DatePicker;
use yii\web\JsExpression;
use kartik\depdrop\DepDrop;
use kartik\time\TimePicker;
use yii\helpers\Url;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model common\models\ProductConfiguration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-configuration-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'product_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(ProductMaster::find()->orderBy('product_name')->all(), 'product_id', 'product_name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a Product...', 'id' => 'product_id'],
        'pluginOptions' => ['allowClear' => true],
    ]); ?>

    <?= $form->field($model, 'product_service_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(ProductService::find()->orderBy('service_name')->all(), 'product_service_id', 'service_name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a Product Service...', 'id' => 'product_service_id'],
        'pluginOptions' => ['allowClear' => true],
    ]); ?>

    <?= $form->field($model, 'product_configurable_columns')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'api_call')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'redirect')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'batch')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'display_to_customer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'step')->textInput() ?>

    <?= $form->field($model, 'store_in_db')->textInput() ?>

    <?= $form->field($model, 'created_date')->widget(\yii\jui\DatePicker::className(), [
        'language' => 'en',
    ])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_date')->widget(\yii\jui\DatePicker::className(), [
        'language' => 'en',
    ])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(AdminUser::find()->orderBy('username')->all(), 'id', 'username'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a User...', 'id' => 'created_by'],
        'pluginOptions' => ['allowClear' => true],
    ]); ?>

    <?= $form->field($model, 'modified_by')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(AdminUser::find()->orderBy('username')->all(), 'id', 'username'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a User...', 'id' => 'modified_by'],
        'pluginOptions' => ['allowClear' => true],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>