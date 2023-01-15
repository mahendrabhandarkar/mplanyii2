<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PartnerLifestyle */

$this->title = Yii::t('app', 'Create Partner Lifestyle');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partner Lifestyles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-lifestyle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
