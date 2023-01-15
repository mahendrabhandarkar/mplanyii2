<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%user_family}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $father_name
 * @property string $mother_name
 * @property string $father_status
 * @property string $mother_status
 * @property string $family_status
 * @property int $brother
 * @property int $sister
 */
class UserFamily extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_family}}';
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
            [['user_id', 'father_name', 'mother_name', 'father_status', 'mother_status', 'family_status', 'brother', 'sister'], 'required'],
            [['user_id', 'brother', 'sister'], 'integer'],
            [['father_name', 'mother_name', 'family_status'], 'string', 'max' => 40],
            [['father_status', 'mother_status'], 'string', 'max' => 60],
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
            'father_name' => Yii::t('app', 'Father Name'),
            'mother_name' => Yii::t('app', 'Mother Name'),
            'father_status' => Yii::t('app', 'Father Status'),
            'mother_status' => Yii::t('app', 'Mother Status'),
            'family_status' => Yii::t('app', 'Family Status'),
            'brother' => Yii::t('app', 'Brother'),
            'sister' => Yii::t('app', 'Sister'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserFamilyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserFamilyQuery(get_called_class());
    }

    public function getUsers()
    {
        return $this->hasOne(Users::class, ['id'=>$this->user_id]);
    }
}
