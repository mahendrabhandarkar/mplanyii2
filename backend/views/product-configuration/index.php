<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductConfigurationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Product Configurations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-configuration-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product Configuration'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_configuration_id',
            'product.product_name',
            'productService.service_name',
            //    'product_configurable_columns:ntext',
            'api_call',
            //'redirect',
            //'batch',
            //'display_to_customer',
            //'step',
            //'store_in_db',
            //'created_date',
            //'modified_date',
            //'created_by',
            //'modified_by',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {design}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::to([$action, 'product_configuration_id' => $key]);
                },
                'buttons' => [
                    'design' => function ($url, $model, $key) {
                        return Html::a('Design', $url);
                    },
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>