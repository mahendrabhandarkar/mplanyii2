<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\jui\DatePicker;
use yii\web\JsExpression;
use kartik\depdrop\DepDrop;
use kartik\time\TimePicker;
use yii\helpers\Url;

$this->title = 'Account Setting';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
			<?php $form = ActiveForm::begin([
				'id' => 'user-update-form',
				'options' => ['class' => 'form-horizontal'],
			]) ?>
			
				<?= $form->field($user, 'username')->textInput(['maxlength' => true]) ?>
				<?= $form->field($user, 'dob')->widget(\yii\jui\DatePicker::className(), [
	                ])->textInput(['maxlength' => true]) ?>
				<?= $form->field($user, 'firstname')->textInput(['maxlength' => true]) ?>
				<?= $form->field($user, 'lastname')->textInput(['maxlength' => true]) ?>
				<?= $form->field($user, 'mobile_no')->textInput(['maxlength' => true]) ?>
				<?= $form->field($profile, 'website')->textInput(['maxlength' => true]) ?>
				<?= $form->field($profile, 'marital_status')->dropDownList([ 'married' => 'Married', 'single' => 'Single', 'divorced' => 'Divorced', ], ['prompt' => '']) ?>
				<?= $form->field($profile, 'height')->dropDownList([ '1' => 'Yes', '0' => 'No',], ['prompt' => '']) ?>
				<?= $form->field($profile, 'skin_tone')->dropDownList([ '1' => 'Yes', '0' => 'No',], ['prompt' => '']) ?>
				<?= $form->field($profile, 'body_type')->dropDownList([ '1' => 'Yes', '0' => 'No',], ['prompt' => '']) ?>
				<?= $form->field($profile, 'diet')->dropDownList([ '1' => 'Yes', '0' => 'No',], ['prompt' => '']) ?>
				<?= $form->field($profile, 'smoke')->dropDownList([ '1' => 'Yes', '0' => 'No',], ['prompt' => '']) ?>
				<?= $form->field($profile, 'drink')->dropDownList([ '1' => 'Yes', '0' => 'No',], ['prompt' => '']) ?>

                <div class="form-group">
					<?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'update-button']) ?>
                    <?= Html::resetButton('Cancel', ['class' => 'btn btn-primary', 'name' => 'cancel-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
