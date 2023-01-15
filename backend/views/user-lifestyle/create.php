<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserLifestyle */

$this->title = Yii::t('app', 'Create User Lifestyle');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Lifestyles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-lifestyle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
