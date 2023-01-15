<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%mother_tongue}}".
 *
 * @property int $id
 * @property string $mtongue
 */
class MotherTongue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%mother_tongue}}';
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
            [['mtongue'], 'required'],
            [['mtongue'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'mtongue' => Yii::t('app', 'Mtongue'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return MotherTongueQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MotherTongueQuery(get_called_class());
    }
}
