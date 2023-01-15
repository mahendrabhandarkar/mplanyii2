<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\helpers\Url;

$this->title = Yii::t('app', 'Product Masters');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-master-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product Master'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'product_id',
            'product_type_id',
            'product_name',
            'product_description',
            'created_by',
            //'created_date',
            //'modified_by',
            //'modified_date',
            //'product_feature',
            //'image_path',
            //'kyc_required',
            //'isagentlogin_required',
            //'product_details_image',
            //'product_header_logo',
            //'product_service',
            //'isencryption_required:boolean',
            //'ekyc_service',

            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::to([$action, 'product_id' => $key]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>