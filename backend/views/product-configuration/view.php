<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductConfiguration */

$this->title = $model->product_configuration_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Configurations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-configuration-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'product_configuration_id' => $model->product_configuration_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'product_configuration_id' => $model->product_configuration_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_configuration_id',
            'product.product_name',
            'productService.service_name',
            'product_configurable_columns:ntext',
            'api_call',
            'redirect',
            'batch',
            'display_to_customer',
            'step',
            'store_in_db',
            'created_date',
            'modified_date',
            'createdBy.username',
            'modified_by',
        ],
    ]) ?>

</div>