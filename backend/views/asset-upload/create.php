<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AssetUpload */

$this->title = Yii::t('app', 'Create Asset Upload');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asset Uploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-upload-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
