<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserHobbiesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-hobbies-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'hobbies') ?>

    <?= $form->field($model, 'interests') ?>

    <?= $form->field($model, 'fav_music') ?>

    <?php // echo $form->field($model, 'fav_books') ?>

    <?php // echo $form->field($model, 'pre_movies') ?>

    <?php // echo $form->field($model, 'cook_food') ?>

    <?php // echo $form->field($model, 'own_words') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
