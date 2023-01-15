<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserFamily */

$this->title = Yii::t('app', 'Create User Family');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Families'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-family-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
