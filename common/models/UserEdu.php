<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%user_edu}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $edu_level_id
 * @property int $edu_field_id
 * @property int $work_with_id
 * @property int $work_as_id
 * @property int $annual_income
 */
class UserEdu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_edu}}';
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
            [['user_id', 'edu_level_id', 'edu_field_id', 'work_with_id', 'work_as_id', 'annual_income'], 'required'],
            [['user_id', 'edu_level_id', 'edu_field_id', 'work_with_id', 'work_as_id', 'annual_income'], 'integer'],
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
            'edu_level_id' => Yii::t('app', 'Edu Level ID'),
            'edu_field_id' => Yii::t('app', 'Edu Field ID'),
            'work_with_id' => Yii::t('app', 'Work With ID'),
            'work_as_id' => Yii::t('app', 'Work As ID'),
            'annual_income' => Yii::t('app', 'Annual Income'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserEduQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserEduQuery(get_called_class());
    }

    public function getUsers()
    {
        return $this->hasOne(Users::class, ['id'=>$this->user_id]);
    }
}
