<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%partner_background}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $preligion_id
 * @property int $pcommunity_id
 * @property string $psub_community
 */
class PartnerBackground extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%partner_background}}';
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
            [['user_id', 'preligion_id', 'pcommunity_id', 'psub_community'], 'required'],
            [['user_id', 'preligion_id', 'pcommunity_id'], 'integer'],
            [['psub_community'], 'string', 'max' => 150],
            [['user_id'], 'unique'],
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
            'preligion_id' => Yii::t('app', 'Preligion ID'),
            'pcommunity_id' => Yii::t('app', 'Pcommunity ID'),
            'psub_community' => Yii::t('app', 'Psub Community'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return PartnerBackgroundQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PartnerBackgroundQuery(get_called_class());
    }

    public function getPartnerBasic()
    {
        return $this->hasOne(PartnerBasic::class, ["user_id" => "user_id"]);
    }
}
