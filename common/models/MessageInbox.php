<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%message_inbox}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $from_to
 * @property string $message
 * @property string $date
 * @property int $view
 */
class MessageInbox extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%message_inbox}}';
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
            [['user_id', 'from_to', 'message', 'date'], 'required'],
            [['user_id', 'from_to', 'view'], 'integer'],
            [['message'], 'string'],
            [['date'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'from_to' => Yii::t('app', 'From To'),
            'message' => Yii::t('app', 'Message'),
            'date' => Yii::t('app', 'Date'),
            'view' => Yii::t('app', 'View'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return MessageInboxQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessageInboxQuery(get_called_class());
    }
}
