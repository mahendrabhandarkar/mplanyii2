<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EducationField */

$this->title = Yii::t('app', 'Create Education Field');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Education Fields'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-field-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
