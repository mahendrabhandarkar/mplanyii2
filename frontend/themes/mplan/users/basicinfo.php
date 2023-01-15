<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;
use yii\jui\Tabs;

$this->title = 'Basic Information';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>
    <div class="row">
        <div class="" style="border:1px;background-color:red;">
            <?php
            echo Tabs::widget([
                'items' => [
                    [
                        'label' => 'My Profile',
                        'content' => 'Mauris mauris ante, blandit et, ultrices a, suscipit eget...',
                        'url' => ['ajax/user-my-profile'],
                    ],
                    [
                        'label' => 'My Family',
                        'content' => 'Sed non urna. Phasellus eu ligula. Vestibulum sit amet purus...',
                        'options' => ['tag' => 'div'],
                        'headerOptions' => ['class' => 'my-class'],
                        'url' => ['ajax/user-my-family'],
                    ],
                    [
                        'label' => 'Photo',
                        'content' => 'Morbi tincidunt, dui sit amet facilisis feugiat...',
                        'options' => ['id' => 'my-tab'],
                        'url' => ['ajax/user-my-photo'],
                    ],
                    [
                        'label' => 'Contact Me',
                        'url' => ['ajax/user-contact-me'],
                    ],
                ],
                'options' => ['tag' => 'div'],
                'itemOptions' => ['tag' => 'div'],
                'headerOptions' => ['class' => 'my-class'],
                'clientOptions' => ['collapsible' => false],
            ]);
            ?>
        </div>
    </div>

</div>