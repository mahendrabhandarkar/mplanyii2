<?php

use common\models\ProductMaster;
use common\models\ProductTypeMaster;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\jui\DatePicker;
use yii\web\JsExpression;
use kartik\depdrop\DepDrop;
use kartik\time\TimePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\ProductTypeConfiguration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-type-configuration-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_type_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(ProductTypeMaster::find()->orderBy('product_type')->all(), 'product_type_id', 'product_type'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a product type...','product_type_id'=>'product_type_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <?= $form->field($model, 'product_type_configurable_columns')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'modified_date')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
