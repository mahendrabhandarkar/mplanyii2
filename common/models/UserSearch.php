<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_search}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $gender
 * @property int $profile_img
 * @property string $marital_status
 * @property int $religion_id
 * @property int $mother_tongue_id
 * @property int $country_id
 * @property int $state_id
 * @property int $city_id
 * @property int $edu_id
 * @property string $diet
 * @property string $disability
 * @property string $hiv_positive
 */
class UserSearch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_search}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'gender', 'profile_img', 'marital_status', 'religion_id', 'mother_tongue_id', 'country_id', 'state_id', 'city_id', 'edu_id', 'diet', 'disability', 'hiv_positive'], 'required'],
            [['user_id', 'profile_img', 'religion_id', 'mother_tongue_id', 'country_id', 'state_id', 'city_id', 'edu_id'], 'integer'],
            [['gender'], 'string', 'max' => 10],
            [['marital_status', 'diet', 'disability', 'hiv_positive'], 'string', 'max' => 20],
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
            'gender' => Yii::t('app', 'Gender'),
            'profile_img' => Yii::t('app', 'Profile Img'),
            'marital_status' => Yii::t('app', 'Marital Status'),
            'religion_id' => Yii::t('app', 'Religion ID'),
            'mother_tongue_id' => Yii::t('app', 'Mother Tongue ID'),
            'country_id' => Yii::t('app', 'Country ID'),
            'state_id' => Yii::t('app', 'State ID'),
            'city_id' => Yii::t('app', 'City ID'),
            'edu_id' => Yii::t('app', 'Edu ID'),
            'diet' => Yii::t('app', 'Diet'),
            'disability' => Yii::t('app', 'Disability'),
            'hiv_positive' => Yii::t('app', 'Hiv Positive'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserSearchQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserSearchQuery(get_called_class());
    }

    public function getUsers()
    {
        return $this->hasOne(Users::class, ['id'=>$this->user_id]);
    }
}
