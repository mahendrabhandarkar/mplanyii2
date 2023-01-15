<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PartnerBackground */

$this->title = Yii::t('app', 'Create Partner Background');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partner Backgrounds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-background-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
