<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FormMaster */

$this->title = Yii::t('app', 'Create Form Master');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Form Masters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-master-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
