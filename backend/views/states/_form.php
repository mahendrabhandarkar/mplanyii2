<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Users;
use common\models\Countries;
use kartik\select2\Select2;
use yii\jui\DatePicker;
use yii\web\JsExpression;
use kartik\depdrop\DepDrop;
use kartik\time\TimePicker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\States */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="states-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')->widget(Select2::classname(), [
	'data'=>ArrayHelper::map(Countries::find()->orderBy('name')->all(), 'id', 'name'),
	'language'=>'en',
	'options'=>['placeholder'=>'Select a country...','id'=>'country_id'],
	'pluginOptions'=>['allowClear'=>true],
	]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
