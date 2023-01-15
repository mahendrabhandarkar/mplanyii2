<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\FormMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\helpers\Url;

$this->title = Yii::t('app', 'Form Masters');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-master-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Form Master'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'form_id',
            'form_field_id',
            'form_field_name',

            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::to([$action, 'form_id' => $key]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>