<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%user_album}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $album_name
 * @property string $album_folder
 * @property string $album_create_date
 */
class UserAlbum extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_album}}';
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
            [['user_id', 'album_name', 'album_folder'], 'required'],
            [['user_id'], 'integer'],
            [['album_create_date'], 'safe'],
            [['album_name', 'album_folder'], 'string', 'max' => 100],
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
            'album_name' => Yii::t('app', 'Album Name'),
            'album_folder' => Yii::t('app', 'Album Folder'),
            'album_create_date' => Yii::t('app', 'Album Create Date'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserAlbumQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserAlbumQuery(get_called_class());
    }

    public function getUsers()
    {
        return $this->hasOne(Users::class, ['id'=>$this->user_id]);
    }
}
