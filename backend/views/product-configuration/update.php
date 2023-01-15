<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductConfiguration */

$this->title = Yii::t('app', 'Update Product Configuration: {name}', [
    'name' => $model->product_configuration_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Configurations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_configuration_id, 'url' => ['view', 'product_configuration_id' => $model->product_configuration_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-configuration-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
