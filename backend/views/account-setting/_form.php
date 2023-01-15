<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AccountSetting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-setting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'display_mobile')->textInput() ?>

    <?= $form->field($model, 'display_email')->textInput() ?>

    <?= $form->field($model, 'display_profile')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
