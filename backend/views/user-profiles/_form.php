<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Users;
use common\models\MotherTongue;
use common\models\Religion;
use common\models\Countries;
use kartik\select2\Select2;
use yii\jui\DatePicker;
use yii\web\JsExpression;
use kartik\depdrop\DepDrop;
use kartik\time\TimePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\UserProfiles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-profiles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(Users::find()->joinwith("authAssignment as b")->where(" b.item_name = 'bride' or b.item_name ='groom' ")->orderBy('firstname')->all(), 'id', 'fullName'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a user...','id'=>'user_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'mother_tongue_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(MotherTongue::find()->orderBy('mtongue')->all(), 'id', 'mtongue'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a mother tongue...','id'=>'mother_tongue_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <?= $form->field($model, 'religion_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(Religion::find()->orderBy('religion_name')->all(), 'id', 'religion_name'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a religion...','id'=>'religion_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <?= $form->field($model, 'country_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(Countries::find()->orderBy('name')->all(), 'id', 'name'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a country...','id'=>'country_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <?= $form->field($model, 'state_id')->textInput() ?>

    <?= $form->field($model, 'city_id')->textInput() ?>

    <?= $form->field($model, 'marital_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'height')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skin_tone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'smoke')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'drink')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'own_words')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'disability')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hiv_positive')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile_complete')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
