<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FormMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-master-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'form_field_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'form_field_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
