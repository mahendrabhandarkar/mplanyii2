<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Users;
use common\models\MotherTongue;
use common\models\Religion;
use common\models\Countries;
use common\models\EducationField;
use common\models\EducationLevel;
use common\models\WorkingAs;
use common\models\WorkingWith;
use kartik\select2\Select2;
use yii\jui\DatePicker;
use yii\web\JsExpression;
use kartik\depdrop\DepDrop;
use kartik\time\TimePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\PartnerEdu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partner-edu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(Users::find()->joinwith("authAssignment as b")->where(" b.item_name = 'bride' or b.item_name ='groom' ")->orderBy('firstname')->all(), 'id', 'fullName'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a user...','id'=>'user_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <?= $form->field($model, 'pedu_level_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(EducationLevel::find()->orderBy('edu_level')->all(), 'id', 'edu_level'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a education level...','id'=>'pedu_level_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <?= $form->field($model, 'pedu_field_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(EducationField::find()->orderBy('edu_field')->all(), 'id', 'edu_field'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a education field...','id'=>'pedu_field_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <?= $form->field($model, 'pwork_with_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(WorkingWith::find()->orderBy('work_with')->all(), 'id', 'work_with'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a work with...','id'=>'pwork_with_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <?= $form->field($model, 'pwork_as_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(WorkingAs::find()->orderBy('work_as')->all(), 'id', 'work_as'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a work as...','id'=>'pwork_as_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <?= $form->field($model, 'pannual_income')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
