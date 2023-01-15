<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProductService */

$this->title = $model->product_service_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-service-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'product_service_id' => $model->product_service_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'product_service_id' => $model->product_service_id], [
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
            'product_service_id',
            'no_of_steps',
            'override:boolean',
            'product_id',
            'service_name',
            'customer_selection_show',
            'service_image_path',
            'service_status',
        ],
    ]) ?>

</div>
