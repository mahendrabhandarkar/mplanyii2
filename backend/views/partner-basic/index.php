<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PartnerBasicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Partner Basics');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-basic-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Partner Basic'), ['create'], ['class' => 'btn btn-success']) ?>
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
            'pcountry_id',
            'pstate_id',
            'pcity_id',
            //'pmtongue_id',
            //'pmarital_status',
            //'page',
            //'pageto',
            //'pheightto',
            //'pheight',
            //'pskin_tone',
            //'pbody_type',
            //'pdisability',
            //'phiv_positive',
            //'pprofile_complete',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
