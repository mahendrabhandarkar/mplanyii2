<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%religion}}".
 *
 * @property int $id
 * @property string $religion_name
 */
class Religion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%religion}}';
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
            [['religion_name'], 'required'],
            [['religion_name'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'religion_name' => Yii::t('app', 'Religion Name'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ReligionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReligionQuery(get_called_class());
    }
}
