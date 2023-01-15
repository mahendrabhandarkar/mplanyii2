<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%ci_sessions}}".
 *
 * @property string $session_id
 * @property string $ip_address
 * @property string $user_agent
 * @property int $last_activity
 * @property string $user_data
 */
class CiSessions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ci_sessions}}';
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
            [['session_id', 'user_agent', 'user_data'], 'required'],
            [['last_activity'], 'integer'],
            [['user_data'], 'string'],
            [['session_id'], 'string', 'max' => 40],
            [['ip_address'], 'string', 'max' => 45],
            [['user_agent'], 'string', 'max' => 120],
            [['session_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'session_id' => Yii::t('app', 'Session ID'),
            'ip_address' => Yii::t('app', 'Ip Address'),
            'user_agent' => Yii::t('app', 'User Agent'),
            'last_activity' => Yii::t('app', 'Last Activity'),
            'user_data' => Yii::t('app', 'User Data'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return CiSessionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CiSessionsQuery(get_called_class());
    }
}
