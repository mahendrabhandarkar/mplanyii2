<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%community}}".
 *
 * @property int $id
 * @property int $religion_id
 * @property string $community_name
 */
class Community extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%community}}';
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
            [['religion_id'], 'integer'],
            [['community_name'], 'required'],
            [['community_name'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'religion_id' => Yii::t('app', 'Religion ID'),
            'community_name' => Yii::t('app', 'Community Name'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return CommunityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommunityQuery(get_called_class());
    }
	
	public function getReligion()
	{
		return $this->hasOne(Religion::className(), ['id' => 'religion_id']);
	}
}
