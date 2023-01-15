<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%education_level}}".
 *
 * @property int $id
 * @property string $edu_level
 */
class EducationLevel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%education_level}}';
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
            [['edu_level'], 'required'],
            [['edu_level'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'edu_level' => Yii::t('app', 'Edu Level'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return EducationLevelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EducationLevelQuery(get_called_class());
    }
}
