<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\UserProfilesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'User Profiles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profiles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create User Profiles'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'website',
            'mother_tongue_id',
            'religion_id',
            //'country_id',
            //'state_id',
            //'city_id',
            //'marital_status',
            //'height',
            //'skin_tone',
            //'body_type',
            //'diet',
            //'smoke',
            //'drink',
            //'own_words',
            //'disability',
            //'hiv_positive',
            //'profile_complete',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
