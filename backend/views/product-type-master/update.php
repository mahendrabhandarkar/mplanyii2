<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductTypeMaster */

$this->title = Yii::t('app', 'Update Product Type Master: {name}', [
    'name' => $model->product_type_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Type Masters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_type_id, 'url' => ['view', 'product_type_id' => $model->product_type_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-type-master-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
