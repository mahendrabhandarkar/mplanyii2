<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%login_attempts}}".
 *
 * @property int $id
 * @property string $ip_address
 * @property string $login
 * @property string $time
 */
class LoginAttempts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%login_attempts}}';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ip_address', 'login'], 'required'],
            [['time'], 'safe'],
            [['ip_address'], 'string', 'max' => 40],
            [['login'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ip_address' => Yii::t('app', 'Ip Address'),
            'login' => Yii::t('app', 'Login'),
            'time' => Yii::t('app', 'Time'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return LoginAttemptsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LoginAttemptsQuery(get_called_class());
    }
}
