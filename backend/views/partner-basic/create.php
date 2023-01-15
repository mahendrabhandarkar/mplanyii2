<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PartnerBasic */

$this->title = Yii::t('app', 'Create Partner Basic');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partner Basics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-basic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
