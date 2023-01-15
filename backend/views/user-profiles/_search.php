<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfilesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-profiles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'website') ?>

    <?= $form->field($model, 'mother_tongue_id') ?>

    <?= $form->field($model, 'religion_id') ?>

    <?php // echo $form->field($model, 'country_id') ?>

    <?php // echo $form->field($model, 'state_id') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'marital_status') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'skin_tone') ?>

    <?php // echo $form->field($model, 'body_type') ?>

    <?php // echo $form->field($model, 'diet') ?>

    <?php // echo $form->field($model, 'smoke') ?>

    <?php // echo $form->field($model, 'drink') ?>

    <?php // echo $form->field($model, 'own_words') ?>

    <?php // echo $form->field($model, 'disability') ?>

    <?php // echo $form->field($model, 'hiv_positive') ?>

    <?php // echo $form->field($model, 'profile_complete') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
