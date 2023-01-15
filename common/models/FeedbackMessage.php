<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%feedback_message}}".
 *
 * @property int $id
 * @property string $email
 * @property string $subject
 * @property string $message
 */
class FeedbackMessage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%feedback_message}}';
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
            [['email', 'subject', 'message'], 'required'],
            [['message'], 'string'],
            [['email'], 'string', 'max' => 100],
            [['subject'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'subject' => Yii::t('app', 'Subject'),
            'message' => Yii::t('app', 'Message'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return FeedbackMessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FeedbackMessageQuery(get_called_class());
    }
}
