<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ApiConfiguration */

$this->title = $model->api_configuration_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Api Configurations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="api-configuration-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'api_configuration_id' => $model->api_configuration_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'api_configuration_id' => $model->api_configuration_id], [
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
            'api_configuration_id',
            'api_name',
            'authentication_type',
            'username',
            'password',
            'access_token',
            'token_endpoint',
            'endpoint_name',
            'use_as',
            'error_handling:ntext',
            'data_type',
            'api_method',
            'api_endpoint_url:ntext',
            'headers:ntext',
            'parameters:ntext',
            'accept',
            'content_type',
            'created_date',
            'modified_date',
            'created_by',
            'modified_by',
            'request_response_configurable:ntext',
        ],
    ]) ?>

</div>
