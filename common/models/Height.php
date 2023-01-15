<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%height}}".
 *
 * @property int $id
 * @property string $height_code
 * @property string $global_height
 */
class Height extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%height}}';
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
            [['height_code', 'global_height'], 'required'],
            [['height_code', 'global_height'], 'string', 'max' => 10],
            [['height_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'height_code' => Yii::t('app', 'Height Code'),
            'global_height' => Yii::t('app', 'Global Height'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return HeightQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HeightQuery(get_called_class());
    }
}
