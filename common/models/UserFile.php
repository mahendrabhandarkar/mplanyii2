<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%user_file}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $img_type
 * @property string $file_name
 * @property string $path
 * @property string $thumb
 * @property int $profile_img
 * @property string $upload_date
 */
class UserFile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_file}}';
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
            [['user_id', 'img_type', 'file_name', 'path', 'thumb', 'profile_img', 'upload_date'], 'required'],
            [['user_id', 'profile_img'], 'integer'],
            [['thumb'], 'string'],
            [['img_type'], 'string', 'max' => 30],
            [['file_name'], 'string', 'max' => 2],
            [['path'], 'string', 'max' => 100],
            [['upload_date'], 'string', 'max' => 20],
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
            'img_type' => Yii::t('app', 'Img Type'),
            'file_name' => Yii::t('app', 'File Name'),
            'path' => Yii::t('app', 'Path'),
            'thumb' => Yii::t('app', 'Thumb'),
            'profile_img' => Yii::t('app', 'Profile Img'),
            'upload_date' => Yii::t('app', 'Upload Date'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserFileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserFileQuery(get_called_class());
    }

    public function getUsers()
    {
        return $this->hasOne(Users::class, ['id'=>$this->user_id]);
    }
}
