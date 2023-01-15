<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Partner Education';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'partner-education-form']); ?>

                <?= $form->field($model, 'pedu_level_id')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'pedu_field_id') ?>

                <?= $form->field($model, 'pwork_with_id') ?>

                <?= $form->field($model, 'pwork_as_id') ?>
                <?= $form->field($model, 'pannual_income') ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'partner-education-submit-button']) ?>
                    <?= Html::resetButton("Cancel", ['class' => 'btn btn-primary', 'name' => 'partner-education-cancel-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
