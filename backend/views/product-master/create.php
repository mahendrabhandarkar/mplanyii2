<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductMaster */

$this->title = Yii::t('app', 'Create Product Master');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Masters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-master-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
