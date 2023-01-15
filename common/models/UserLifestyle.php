<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%user_lifestyle}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $diet
 * @property string $smoke
 * @property string $drink
 */
class UserLifestyle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_lifestyle}}';
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
            [['user_id', 'diet', 'smoke', 'drink'], 'required'],
            [['user_id'], 'integer'],
            [['diet'], 'string', 'max' => 10],
            [['smoke'], 'string', 'max' => 15],
            [['drink'], 'string', 'max' => 20],
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
            'diet' => Yii::t('app', 'Diet'),
            'smoke' => Yii::t('app', 'Smoke'),
            'drink' => Yii::t('app', 'Drink'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserLifestyleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserLifestyleQuery(get_called_class());
    }

    public function getUsers()
    {
        return $this->hasOne(Users::class, ['id'=>$this->user_id]);
    }
}
