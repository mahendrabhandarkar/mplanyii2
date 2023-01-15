<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserFamilySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-family-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'father_name') ?>

    <?= $form->field($model, 'mother_name') ?>

    <?= $form->field($model, 'father_status') ?>

    <?php // echo $form->field($model, 'mother_status') ?>

    <?php // echo $form->field($model, 'family_status') ?>

    <?php // echo $form->field($model, 'brother') ?>

    <?php // echo $form->field($model, 'sister') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
