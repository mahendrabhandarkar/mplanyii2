<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;
use yii\jui\JuiAsset;
use yii\web\View;

$this->title = 'Update Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
	<div class="row">
	<?php
		echo $this->renderAjax('/ajax/updateprofilemenu');
	?>
	</div>
	<br />
    <div id="update-profile-content"></div>
</div>
