<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ApiConfigurationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="api-configuration-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'api_configuration_id') ?>

    <?= $form->field($model, 'api_name') ?>

    <?= $form->field($model, 'authentication_type') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password') ?>

    <?php // echo $form->field($model, 'access_token') ?>

    <?php // echo $form->field($model, 'token_endpoint') ?>

    <?php // echo $form->field($model, 'endpoint_name') ?>

    <?php // echo $form->field($model, 'use_as') ?>

    <?php // echo $form->field($model, 'error_handling') ?>

    <?php // echo $form->field($model, 'data_type') ?>

    <?php // echo $form->field($model, 'api_method') ?>

    <?php // echo $form->field($model, 'api_endpoint_url') ?>

    <?php // echo $form->field($model, 'headers') ?>

    <?php // echo $form->field($model, 'parameters') ?>

    <?php // echo $form->field($model, 'accept') ?>

    <?php // echo $form->field($model, 'content_type') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <?php // echo $form->field($model, 'request_response_configurable') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
