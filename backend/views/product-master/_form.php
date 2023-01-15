<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-master-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_type_id')->textInput() ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'modified_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_date')->textInput() ?>

    <?= $form->field($model, 'product_feature')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_path')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kyc_required')->textInput() ?>

    <?= $form->field($model, 'isagentlogin_required')->textInput() ?>

    <?= $form->field($model, 'product_details_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_header_logo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_service')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isencryption_required')->checkbox() ?>

    <?= $form->field($model, 'ekyc_service')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
