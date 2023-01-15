<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MessageInbox */

$this->title = Yii::t('app', 'Create Message Inbox');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Message Inboxes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-inbox-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
