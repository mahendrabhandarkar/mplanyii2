<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ApiConfiguration */

$this->title = Yii::t('app', 'Update Api Configuration: {name}', [
    'name' => $model->api_configuration_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Api Configurations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->api_configuration_id, 'url' => ['view', 'api_configuration_id' => $model->api_configuration_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="api-configuration-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
