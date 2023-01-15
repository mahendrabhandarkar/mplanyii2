<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EducationLevel */

$this->title = Yii::t('app', 'Create Education Level');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Education Levels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="education-level-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
