<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%account_setting}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $display_mobile
 * @property int $display_email
 * @property int $display_profile
 */
class AccountSetting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%account_setting}}';
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
            [['user_id'], 'required'],
            [['user_id', 'display_mobile', 'display_email', 'display_profile'], 'integer'],
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
            'display_mobile' => Yii::t('app', 'Display Mobile'),
            'display_email' => Yii::t('app', 'Display Email'),
            'display_profile' => Yii::t('app', 'Display Profile'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return AccountSettingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AccountSettingQuery(get_called_class());
    }
}
