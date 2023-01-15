<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SubCommunity */

$this->title = Yii::t('app', 'Create Sub Community');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sub Communities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-community-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
