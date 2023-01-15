<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_autologin}}".
 *
 * @property string $key_id
 * @property int $user_id
 * @property string $user_agent
 * @property string $last_ip
 * @property string $last_login
 */
class UserAutologin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_autologin}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key_id', 'user_id', 'user_agent', 'last_ip'], 'required'],
            [['user_id'], 'integer'],
            [['last_login'], 'safe'],
            [['key_id'], 'string', 'max' => 32],
            [['user_agent'], 'string', 'max' => 150],
            [['last_ip'], 'string', 'max' => 40],
            [['key_id', 'user_id'], 'unique', 'targetAttribute' => ['key_id', 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'key_id' => Yii::t('app', 'Key ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'user_agent' => Yii::t('app', 'User Agent'),
            'last_ip' => Yii::t('app', 'Last Ip'),
            'last_login' => Yii::t('app', 'Last Login'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserAutologinQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserAutologinQuery(get_called_class());
    }

    public function getUsers()
    {
        return $this->hasOne(Users::class, ['id'=>$this->user_id]);
    }
}
