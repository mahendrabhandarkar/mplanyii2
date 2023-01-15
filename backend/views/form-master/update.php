<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FormMaster */

$this->title = Yii::t('app', 'Update Form Master: {name}', [
    'name' => $model->form_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Form Masters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->form_id, 'url' => ['view', 'form_id' => $model->form_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="form-master-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
