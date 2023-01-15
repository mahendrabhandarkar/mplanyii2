<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Religion;

/* @var $this yii\web\View */
/* @var $model common\models\Community */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="community-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'religion_id')->textInput() ?>

    <?= $form->field($model, 'community_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
