<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%user_hobbies}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $hobbies
 * @property string $interests
 * @property string $fav_music
 * @property string $fav_books
 * @property string $pre_movies
 * @property string $cook_food
 * @property string $own_words
 */
class UserHobbies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_hobbies}}';
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
            [['user_id', 'hobbies', 'interests', 'fav_music', 'fav_books', 'pre_movies', 'cook_food', 'own_words'], 'required'],
            [['user_id'], 'integer'],
            [['hobbies', 'interests', 'fav_music', 'fav_books', 'pre_movies'], 'string', 'max' => 250],
            [['cook_food'], 'string', 'max' => 150],
            [['own_words'], 'string', 'max' => 800],
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
            'hobbies' => Yii::t('app', 'Hobbies'),
            'interests' => Yii::t('app', 'Interests'),
            'fav_music' => Yii::t('app', 'Fav Music'),
            'fav_books' => Yii::t('app', 'Fav Books'),
            'pre_movies' => Yii::t('app', 'Pre Movies'),
            'cook_food' => Yii::t('app', 'Cook Food'),
            'own_words' => Yii::t('app', 'Own Words'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserHobbiesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserHobbiesQuery(get_called_class());
    }

    public function getUsers()
    {
        return $this->hasOne(Users::class, ['id'=>$this->user_id]);
    }
}
