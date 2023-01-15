<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%working_with}}".
 *
 * @property int $id
 * @property string $work_with
 */
class WorkingWith extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%working_with}}';
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
            [['work_with'], 'required'],
            [['work_with'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'work_with' => Yii::t('app', 'Work With'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return WorkingWithQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkingWithQuery(get_called_class());
    }
}
