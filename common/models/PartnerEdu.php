<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%partner_edu}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $pedu_level_id
 * @property int $pedu_field_id
 * @property int $pwork_with_id
 * @property int $pwork_as_id
 * @property int $pannual_income
 */
class PartnerEdu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%partner_edu}}';
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
            [['user_id', 'pedu_level_id', 'pedu_field_id', 'pwork_with_id', 'pwork_as_id', 'pannual_income'], 'required'],
            [['user_id', 'pedu_level_id', 'pedu_field_id', 'pwork_with_id', 'pwork_as_id', 'pannual_income'], 'integer'],
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
            'pedu_level_id' => Yii::t('app', 'Pedu Level ID'),
            'pedu_field_id' => Yii::t('app', 'Pedu Field ID'),
            'pwork_with_id' => Yii::t('app', 'Pwork With ID'),
            'pwork_as_id' => Yii::t('app', 'Pwork As ID'),
            'pannual_income' => Yii::t('app', 'Pannual Income'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return PartnerEduQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PartnerEduQuery(get_called_class());
    }

    public function getPartnerBasic()
    {
        return $this->hasOne(PartnerBasic::class, ["user_id" => "user_id"]);
    }
}
