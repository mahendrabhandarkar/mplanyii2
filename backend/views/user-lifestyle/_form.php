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
/* @var $model common\models\UserLifestyle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-lifestyle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(Users::find()->joinwith("authAssignment as b")->where(" b.item_name = 'bride' or b.item_name ='groom' ")->orderBy('firstname')->all(), 'id', 'fullName'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a user...','id'=>'user_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <?= $form->field($model, 'diet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'smoke')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'drink')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
