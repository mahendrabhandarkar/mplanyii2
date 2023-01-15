<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%partner_lifestyle}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $pdiet
 * @property string $psmoke
 * @property string $pdrink
 */
class PartnerLifestyle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%partner_lifestyle}}';
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
            [['user_id', 'pdiet', 'psmoke', 'pdrink'], 'required'],
            [['user_id'], 'integer'],
            [['pdiet', 'psmoke', 'pdrink'], 'string', 'max' => 100],
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
            'pdiet' => Yii::t('app', 'Pdiet'),
            'psmoke' => Yii::t('app', 'Psmoke'),
            'pdrink' => Yii::t('app', 'Pdrink'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return PartnerLifestyleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PartnerLifestyleQuery(get_called_class());
    }

    public function getPartnerBasic()
    {
        return $this->hasOne(PartnerBasic::class, ["user_id" => "user_id"]);
    }
}
