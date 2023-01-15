<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductApiConfiguration */

$this->title = Yii::t('app', 'Create Product Api Configuration');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Api Configurations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-api-configuration-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
