<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%user_profiles}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $website
 * @property int $mother_tongue_id
 * @property int $religion_id
 * @property int $country_id
 * @property int $state_id
 * @property int $city_id
 * @property string $marital_status
 * @property string $height
 * @property string $skin_tone
 * @property string $body_type
 * @property string $diet
 * @property string $smoke
 * @property string $drink
 * @property string $own_words
 * @property string $disability
 * @property string $hiv_positive
 * @property int $profile_complete
 */
class UserProfiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_profiles}}';
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
        //    [['user_id', 'mother_tongue_id', 'religion_id', 'country_id', 'state_id', 'city_id', 'marital_status', 'height', 'skin_tone', 'body_type', 'diet', 'smoke', 'drink', 'own_words', 'disability', 'hiv_positive', 'profile_complete'], 'required'],
            [['user_id', 'mother_tongue_id', 'religion_id', 'country_id', 'state_id', 'city_id', 'profile_complete'], 'integer'],
            [['website'], 'string', 'max' => 255],
            [['marital_status', 'smoke', 'drink'], 'string', 'max' => 20],
            [['height', 'hiv_positive'], 'string', 'max' => 10],
            [['skin_tone', 'body_type'], 'string', 'max' => 15],
            [['diet', 'disability'], 'string', 'max' => 25],
            [['own_words'], 'string', 'max' => 300],
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
            'website' => Yii::t('app', 'Website'),
            'mother_tongue_id' => Yii::t('app', 'Mother Tongue ID'),
            'religion_id' => Yii::t('app', 'Religion ID'),
            'country_id' => Yii::t('app', 'Country ID'),
            'state_id' => Yii::t('app', 'State ID'),
            'city_id' => Yii::t('app', 'City ID'),
            'marital_status' => Yii::t('app', 'Marital Status'),
            'height' => Yii::t('app', 'Height'),
            'skin_tone' => Yii::t('app', 'Skin Tone'),
            'body_type' => Yii::t('app', 'Body Type'),
            'diet' => Yii::t('app', 'Diet'),
            'smoke' => Yii::t('app', 'Smoke'),
            'drink' => Yii::t('app', 'Drink'),
            'own_words' => Yii::t('app', 'Own Words'),
            'disability' => Yii::t('app', 'Disability'),
            'hiv_positive' => Yii::t('app', 'Hiv Positive'),
            'profile_complete' => Yii::t('app', 'Profile Complete'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserProfilesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserProfilesQuery(get_called_class());
    }

    public function getUsers()
    {
        return $this->hasOne(Users::class, ['id'=>$this->user_id]);
    }

    public function getHeights()
    {
        return $this->hasOne(Height::className(), ['id' => 'height']);
    }

    public function getMotherTongueId()
    {
        return $this->hasOne(MotherTongue::className(), ['id' => 'mother_tongue_id']);
    }
}
