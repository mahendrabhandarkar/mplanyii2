<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductConfiguration */

$this->title = Yii::t('app', 'Create Product Configuration');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Configurations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-configuration-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
