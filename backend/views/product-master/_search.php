<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductMasterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-master-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'product_type_id') ?>

    <?= $form->field($model, 'product_name') ?>

    <?= $form->field($model, 'product_description') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <?php // echo $form->field($model, 'product_feature') ?>

    <?php // echo $form->field($model, 'image_path') ?>

    <?php // echo $form->field($model, 'kyc_required') ?>

    <?php // echo $form->field($model, 'isagentlogin_required') ?>

    <?php // echo $form->field($model, 'product_details_image') ?>

    <?php // echo $form->field($model, 'product_header_logo') ?>

    <?php // echo $form->field($model, 'product_service') ?>

    <?php // echo $form->field($model, 'isencryption_required')->checkbox() ?>

    <?php // echo $form->field($model, 'ekyc_service') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
