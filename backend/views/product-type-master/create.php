<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProductTypeMaster */

$this->title = Yii::t('app', 'Create Product Type Master');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Type Masters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-type-master-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
