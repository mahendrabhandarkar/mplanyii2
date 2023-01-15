<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'partner-background-form']); ?>

        <?= $form->field($model, 'preligion_id')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'pcommunity_id') ?>

        <?= $form->field($model, 'psub_community') ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'partner-background-submit-button']) ?>
            <?= Html::resetButton("Cancel", ['class' => 'btn btn-primary', 'name' => 'partner-background-cancel-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
