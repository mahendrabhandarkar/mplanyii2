<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ApiConfiguration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="api-configuration-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'api_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'authentication_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'access_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'token_endpoint')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'endpoint_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'use_as')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'error_handling')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'api_method')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'api_endpoint_url')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'headers')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'parameters')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'accept')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'modified_date')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'request_response_configurable')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
