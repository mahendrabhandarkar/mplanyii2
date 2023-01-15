<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;
use yii\jui\JuiAsset;
use yii\web\View;
use common\models\Users;
?>
<?php $form = ActiveForm::begin([
    'id' => 'update-profile-basicinfo-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>

    <?= $form->field($model, 'gender') ?>
    
    <?= $form->field($model, 'mobile_no') ?>
    
    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'partner-basic-submit-button']) ?>
        <?= Html::resetButton('Cancel', ['class' => 'btn btn-primary', 'name' => 'partner-basic-reset-button']) ?>
    </div>

<?php ActiveForm::end(); ?>