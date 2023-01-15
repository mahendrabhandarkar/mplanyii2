<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $mobile_no
 * @property string $profile_for
 * @property string $gender
 * @property string $dob
 * @property int $activated
 * @property int $banned
 * @property string|null $ban_reason
 * @property string|null $new_password_key
 * @property string|null $new_password_requested
 * @property string|null $new_email
 * @property string|null $new_email_key
 * @property string $last_ip
 * @property int|null $last_login
 * @property string $firstname
 * @property string $lastname
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email', 'mobile_no', 'profile_for', 'gender', 'dob', 'last_ip', 'firstname', 'lastname', 'auth_key', 'password_hash', 'created_at', 'updated_at'], 'required'],
            [['activated', 'banned', 'last_login', 'status', 'created_at', 'updated_at'], 'integer'],
            [['new_password_requested'], 'safe'],
            [['username', 'new_password_key', 'new_email_key', 'firstname', 'lastname'], 'string', 'max' => 50],
            [['email', 'new_email'], 'string', 'max' => 100],
            [['mobile_no'], 'string', 'max' => 20],
            [['profile_for'], 'string', 'max' => 25],
            [['gender'], 'string', 'max' => 15],
            [['dob'], 'string', 'max' => 30],
            [['ban_reason', 'password_hash', 'password_reset_token', 'verification_token'], 'string', 'max' => 255],
            [['last_ip'], 'string', 'max' => 40],
            [['auth_key'], 'string', 'max' => 32],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'mobile_no' => Yii::t('app', 'Mobile No'),
            'profile_for' => Yii::t('app', 'Profile For'),
            'gender' => Yii::t('app', 'Gender'),
            'dob' => Yii::t('app', 'Dob'),
            'activated' => Yii::t('app', 'Activated'),
            'banned' => Yii::t('app', 'Banned'),
            'ban_reason' => Yii::t('app', 'Ban Reason'),
            'new_password_key' => Yii::t('app', 'New Password Key'),
            'new_password_requested' => Yii::t('app', 'New Password Requested'),
            'new_email' => Yii::t('app', 'New Email'),
            'new_email_key' => Yii::t('app', 'New Email Key'),
            'last_ip' => Yii::t('app', 'Last Ip'),
            'last_login' => Yii::t('app', 'Last Login'),
            'firstname' => Yii::t('app', 'Firstname'),
            'lastname' => Yii::t('app', 'Lastname'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'verification_token' => Yii::t('app', 'Verification Token'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }
}
