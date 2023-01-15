<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PartnerBasicSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partner-basic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'pcountry_id') ?>

    <?= $form->field($model, 'pstate_id') ?>

    <?= $form->field($model, 'pcity_id') ?>

    <?php // echo $form->field($model, 'pmtongue_id') ?>

    <?php // echo $form->field($model, 'pmarital_status') ?>

    <?php // echo $form->field($model, 'page') ?>

    <?php // echo $form->field($model, 'pageto') ?>

    <?php // echo $form->field($model, 'pheightto') ?>

    <?php // echo $form->field($model, 'pheight') ?>

    <?php // echo $form->field($model, 'pskin_tone') ?>

    <?php // echo $form->field($model, 'pbody_type') ?>

    <?php // echo $form->field($model, 'pdisability') ?>

    <?php // echo $form->field($model, 'phiv_positive') ?>

    <?php // echo $form->field($model, 'pprofile_complete') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
