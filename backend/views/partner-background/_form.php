<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Users;
use common\models\MotherTongue;
use common\models\Religion;
use common\models\Community;
use common\models\SubCommunity;
use kartik\select2\Select2;
use yii\jui\DatePicker;
use yii\web\JsExpression;
use kartik\depdrop\DepDrop;
use kartik\time\TimePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\PartnerBackground */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partner-background-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(Users::find()->joinwith("authAssignment as b")->where(" b.item_name = 'bride' or b.item_name ='groom' ")->orderBy('firstname')->all(), 'id', 'fullName'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a user...','id'=>'user_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <?= $form->field($model, 'preligion_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(Religion::find()->orderBy('religion_name')->all(), 'id', 'religion_name'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a religion...','id'=>'preligion_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <?= $form->field($model, 'pcommunity_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(Community::find()->orderBy('community_name')->all(), 'id', 'community_name'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a community...','id'=>'pcommunity_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <?= $form->field($model, 'psub_community')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(SubCommunity::find()->orderBy('sub_community_name')->all(), 'id', 'sub_community_name'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a sub-community...','id'=>'psub_community'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
