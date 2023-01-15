<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductService */

$this->title = Yii::t('app', 'Create Product Service');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelProductConfig' => $modelsAddress
    ]) ?>

</div>
