<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Partner Basic';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>You like in Your partner.</p>

    <div class="row">
        <div class="col-lg-8">
            <?php $form = ActiveForm::begin([
				'id' => 'partner-basic-form',
				'options' => ['class' => 'form-horizontal'],
			]) ?>
			
				<?= $form->field($user, 'pmarital_status') ?>
				
				<?= $form->field($profile, 'pannual_income') ?>
				
                <div class="form-group">
					<?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'partner-basic-submit-button']) ?>
                    <?= Html::resetButton('Cancel', ['class' => 'btn btn-primary', 'name' => 'partner-basic-reset-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
