<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\widgets\DetailView;

    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fullname',
			'userProfiles.marital_status',
			'userProfiles.height',
			'userProfiles.mother_tongue_id',
			'userProfiles.skin_tone',
			'userProfiles.body_type',
			
			'userProfiles.mother_tongue_id',
			'userProfiles.mother_tongue_id',
            'email:email',
            'mobile_no',
            'profile_for',
            'gender',
            'dob',
            'activated',
            'banned',
            'ban_reason',
            'new_password_key',
            'new_password_requested',
            'new_email:email',
            'new_email_key:email',
            'last_ip',
            'last_login',
            'firstname',
            'lastname',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'status',
            'created_at',
            'updated_at',
            'verification_token',
        ],
    ]); ?>