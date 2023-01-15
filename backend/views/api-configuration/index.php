<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ApiConfigurationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use Yii\helpers\Url;

$this->title = Yii::t('app', 'Api Configurations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="api-configuration-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Api Configuration'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'api_configuration_id',
            'api_name',
            'authentication_type',
            'username',
            'password',
            //'access_token',
            //'token_endpoint',
            //'endpoint_name',
            //'use_as',
            //'error_handling:ntext',
            //'data_type',
            //'api_method',
            //'api_endpoint_url:ntext',
            //'headers:ntext',
            //'parameters:ntext',
            //'accept',
            //'content_type',
            //'created_date',
            //'modified_date',
            //'created_by',
            //'modified_by',
            //'request_response_configurable:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::to([$action, 'api_configuration_id' => $key]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>