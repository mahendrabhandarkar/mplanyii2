<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "{{%working_as}}".
 *
 * @property int $id
 * @property string $work_as
 */
class WorkingAs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%working_as}}';
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
            [['work_as'], 'required'],
            [['work_as'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'work_as' => Yii::t('app', 'Work As'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return WorkingAsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WorkingAsQuery(get_called_class());
    }
}
