<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductService */

$this->title = Yii::t('app', 'Update Product Service: {name}', [
    'name' => $model->product_service_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_service_id, 'url' => ['view', 'product_service_id' => $model->product_service_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-service-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelProductConfig' => $modelsAddress
    ]) ?>

</div>
