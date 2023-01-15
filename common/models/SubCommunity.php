<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%sub_community}}".
 *
 * @property int $id
 * @property int $community_id
 * @property string $sub_community_name
 */
class SubCommunity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sub_community}}';
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
            [['community_id', 'sub_community_name'], 'required'],
            [['community_id'], 'integer'],
            [['sub_community_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'community_id' => Yii::t('app', 'Community ID'),
            'sub_community_name' => Yii::t('app', 'Sub Community Name'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return SubCommunityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SubCommunityQuery(get_called_class());
    }
}
