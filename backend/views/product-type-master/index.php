<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductTypeMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\helpers\Url;

$this->title = Yii::t('app', 'Product Type Masters');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-type-master-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product Type Master'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_type_id',
            'product_type',
            'product_type_description',
            'created_date',
            'modified_date',
            //'created_by',
            //'modified_by',

            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::to([$action, 'product_type_id' => $key]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>