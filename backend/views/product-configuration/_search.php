<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductConfigurationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-configuration-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'product_configuration_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'product_service_id') ?>

    <?= $form->field($model, 'product_configurable_columns') ?>

    <?= $form->field($model, 'api_call') ?>

    <?php // echo $form->field($model, 'redirect') ?>

    <?php // echo $form->field($model, 'batch') ?>

    <?php // echo $form->field($model, 'display_to_customer') ?>

    <?php // echo $form->field($model, 'step') ?>

    <?php // echo $form->field($model, 'store_in_db') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
