<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EducationLevel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="education-level-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'edu_level')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
