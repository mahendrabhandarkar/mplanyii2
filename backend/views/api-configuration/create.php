<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ApiConfiguration */

$this->title = Yii::t('app', 'Create Api Configuration');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Api Configurations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="api-configuration-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
