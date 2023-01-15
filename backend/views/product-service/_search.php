<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductServiceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-service-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'product_service_id') ?>

    <?= $form->field($model, 'no_of_steps') ?>

    <?= $form->field($model, 'override')->checkbox() ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'service_name') ?>

    <?php // echo $form->field($model, 'customer_selection_show') ?>

    <?php // echo $form->field($model, 'service_image_path') ?>

    <?php // echo $form->field($model, 'service_status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
