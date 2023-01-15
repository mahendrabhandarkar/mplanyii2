<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PartnerEdu */

$this->title = Yii::t('app', 'Create Partner Edu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partner Edus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-edu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
