<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductApiConfiguration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-api-configuration-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'api_configuration_id')->textInput() ?>

    <?= $form->field($model, 'product_configuration_id')->textInput() ?>

    <?= $form->field($model, 'refering_product_service_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
