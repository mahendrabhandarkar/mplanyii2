<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AssetUpload */

$this->title = Yii::t('app', 'Update Asset Upload: {name}', [
    'name' => $model->layout_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asset Uploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->layout_id, 'url' => ['view', 'layout_id' => $model->layout_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="asset-upload-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
