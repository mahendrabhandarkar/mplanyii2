<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;
use yii\widgets\Pjax;
use yii\grid\GridView;

$this->title = 'Desired Partner';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
    <div class="col-lg-3">
            <?php $form = ActiveForm::begin(['id' => 'desiredpartner-form']); ?>

                <?= $form->field($model, 'pcountry_id')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'pmarital_status') ?>

                <?= $form->field($model, 'pbody_type') ?>

                <?= $form->field($model, 'phiv_positive')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'name' => 'matches-search']) ?>
                    <?= Html::resetButton('Cancel', ['class' => 'btn btn-primary', 'name' => 'matches-cancel']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-lg-5">
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'pmtongue_id',
                'pmarital_status',
            ],
        ]); ?>
        <?php Pjax::end(); ?>

        </div>
    </div>

</div>
