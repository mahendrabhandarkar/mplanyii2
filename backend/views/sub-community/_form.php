<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SubCommunity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sub-community-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'community_id')->textInput() ?>

    <?= $form->field($model, 'sub_community_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
