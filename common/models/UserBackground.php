<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%user_background}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $religion_id
 * @property int $community_id
 * @property string $sub_community
 * @property int $bcomplete
 */
class UserBackground extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_background}}';
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
            [['user_id', 'religion_id', 'community_id', 'sub_community', 'bcomplete'], 'required'],
            [['user_id', 'religion_id', 'community_id', 'bcomplete'], 'integer'],
            [['sub_community'], 'string', 'max' => 100],
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
            'religion_id' => Yii::t('app', 'Religion ID'),
            'community_id' => Yii::t('app', 'Community ID'),
            'sub_community' => Yii::t('app', 'Sub Community'),
            'bcomplete' => Yii::t('app', 'Bcomplete'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserBackgroundQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserBackgroundQuery(get_called_class());
    }

    public function getUsers()
    {
        return $this->hasOne(Users::class, ['id'=>$this->user_id]);
    }
}
