<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PartnerEduSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partner-edu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'pedu_level_id') ?>

    <?= $form->field($model, 'pedu_field_id') ?>

    <?= $form->field($model, 'pwork_with_id') ?>

    <?php // echo $form->field($model, 'pwork_as_id') ?>

    <?php // echo $form->field($model, 'pannual_income') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
