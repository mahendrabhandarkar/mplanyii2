<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;
use yii\jui\Tabs;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Json;
use common\models\ProductService;
use common\models\ProductMaster;
use common\models\ProductConfiguration;

$this->title = Yii::t('app', 'Design Product Service: {name}', [
    'name' => $model->product_service_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_service_id, 'url' => ['view', 'product_service_id' => $model->product_service_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Design');
?>
<div class="product-service-design">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>
    <div class="row">
        <div class="" style="border:1px;background-color:red;">
            <?php
            echo Tabs::widget([
                'items' => [
                    [
                        'label' => 'My Profile',
                        'content' => 'Mauris mauris ante, blandit et, ultrices a, suscipit eget...',
                        'url' => ['ajax/user-my-profile'],
                    ],
                    [
                        'label' => 'My Family',
                        'content' => 'Sed non urna. Phasellus eu ligula. Vestibulum sit amet purus...',
                        'options' => ['tag' => 'div'],
                        'headerOptions' => ['class' => 'my-class'],
                        'url' => ['ajax/user-my-family'],
                    ],
                    [
                        'label' => 'Photo',
                        'content' => 'Morbi tincidunt, dui sit amet facilisis feugiat...',
                        'options' => ['id' => 'my-tab'],
                        'url' => ['ajax/user-my-photo'],
                    ],
                    [
                        'label' => 'Contact Me',
                        'url' => ['ajax/user-contact-me'],
                    ],
                ],
                'options' => ['tag' => 'div'],
                'itemOptions' => ['tag' => 'div'],
                'headerOptions' => ['class' => 'my-class'],
                'clientOptions' => ['collapsible' => false],
            ]);
            ?>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-envelope"></i> Address Book
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add address</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($modelProductConfig as $index => $modelAddress): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-product-configuration">Address: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?= print_r(Json::decode($modelAddress['product_configurable_columns'])); ?>
                        <div class="row">
                            <div class="col-sm-6">
                            <?= Html::label($modelAddress['api_call']); ?>
                            </div>
                            <div class="col-sm-6">
                            <?= Html::label($modelAddress['redirect']); ?>
                            </div>
                        </div><!-- end:row -->

                        <div class="row">
                            <div class="col-sm-6">
                            <?= Html::label($modelAddress['batch']); ?>
                            </div>
                            <div class="col-sm-6">
                            <?= Html::label($modelAddress['display_to_customer']); ?>
                            </div>
                        </div><!-- end:row -->

                        <div class="row">
                            <div class="col-sm-6">
                            <?= Html::label($modelAddress['step']); ?>
                            </div>
                            <div class="col-sm-6">
                            <?= Html::label($modelAddress['store_in_db']); ?>
                            </div>
                        </div><!-- end:row -->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>
