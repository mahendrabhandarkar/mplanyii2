<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%education_field}}".
 *
 * @property int $id
 * @property string $edu_field
 */
class EducationField extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%education_field}}';
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
            [['edu_field'], 'required'],
            [['edu_field'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'edu_field' => Yii::t('app', 'Edu Field'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return EducationFieldQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EducationFieldQuery(get_called_class());
    }
}
