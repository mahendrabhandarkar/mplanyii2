<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AssetUpload */

$this->title = $model->layout_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asset Uploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asset-upload-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'layout_id' => $model->layout_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'layout_id' => $model->layout_id], [
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
            'layout_id',
            'layout_name',
            'image_name',
            'image_path',
            'layout_status',
            'option_description',
            'created_date',
            'modified_date',
            'created_by',
            'modified_by',
        ],
    ]) ?>

</div>
