<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%partner_basic}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $pcountry_id
 * @property int $pstate_id
 * @property int $pcity_id
 * @property int $pmtongue_id
 * @property string $pmarital_status
 * @property int $page
 * @property int $pageto
 * @property int $pheightto
 * @property int $pheight
 * @property string $pskin_tone
 * @property string $pbody_type
 * @property string $pdisability
 * @property string $phiv_positive
 * @property int $pprofile_complete
 */
class PartnerBasic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%partner_basic}}';
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
            [['user_id', 'pcountry_id', 'pstate_id', 'pcity_id', 'pmtongue_id', 'pmarital_status', 'page', 'pageto', 'pheightto', 'pheight', 'pskin_tone', 'pbody_type', 'pdisability', 'phiv_positive', 'pprofile_complete'], 'required'],
            [['user_id', 'pcountry_id', 'pstate_id', 'pcity_id', 'pmtongue_id', 'page', 'pageto', 'pheightto', 'pheight', 'pprofile_complete'], 'integer'],
            [['pmarital_status', 'pskin_tone', 'pbody_type', 'pdisability'], 'string', 'max' => 50],
            [['phiv_positive'], 'string', 'max' => 40],
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
            'pcountry_id' => Yii::t('app', 'Pcountry ID'),
            'pstate_id' => Yii::t('app', 'Pstate ID'),
            'pcity_id' => Yii::t('app', 'Pcity ID'),
            'pmtongue_id' => Yii::t('app', 'Pmtongue ID'),
            'pmarital_status' => Yii::t('app', 'Pmarital Status'),
            'page' => Yii::t('app', 'Page'),
            'pageto' => Yii::t('app', 'Pageto'),
            'pheightto' => Yii::t('app', 'Pheightto'),
            'pheight' => Yii::t('app', 'Pheight'),
            'pskin_tone' => Yii::t('app', 'Pskin Tone'),
            'pbody_type' => Yii::t('app', 'Pbody Type'),
            'pdisability' => Yii::t('app', 'Pdisability'),
            'phiv_positive' => Yii::t('app', 'Phiv Positive'),
            'pprofile_complete' => Yii::t('app', 'Pprofile Complete'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return PartnerBasicQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PartnerBasicQuery(get_called_class());
    }

    public function getPartnerEdu()
    {
        return $this->hasOne(PartnerEdu::class, ["user_id" => "user_id"]);
    }

    public function getPartnerBackground()
    {
        return $this->hasOne(PartnerBackground::class, ["user_id" => "user_id"]);
    }

    public function getPartnerLifestyle()
    {
        return $this->hasOne(PartnerLifestyle::class, ["user_id" => "user_id"]);
    }
}
