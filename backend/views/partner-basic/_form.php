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
/* @var $model common\models\PartnerBasic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partner-basic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(Users::find()->joinwith("authAssignment as b")->where(" b.item_name = 'bride' or b.item_name ='groom' ")->orderBy('firstname')->all(), 'id', 'fullName'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a user...','id'=>'user_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <?= $form->field($model, 'pcountry_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(Countries::find()->orderBy('name')->all(), 'id', 'name'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a country...','id'=>'pcountry_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>
	
    <?= $form->field($model, 'pstate_id')->textInput() ?>

    <?= $form->field($model, 'pcity_id')->textInput() ?>

    <?= $form->field($model, 'pmtongue_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(MotherTongue::find()->orderBy('mtongue')->all(), 'id', 'mtongue'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a mother tongue...','id'=>'pmtongue_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <?= $form->field($model, 'pmarital_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'page')->textInput() ?>

    <?= $form->field($model, 'pageto')->textInput() ?>

    <?= $form->field($model, 'pheightto')->textInput() ?>

    <?= $form->field($model, 'pheight')->textInput() ?>

    <?= $form->field($model, 'pskin_tone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pbody_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pdisability')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phiv_positive')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pprofile_complete')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
