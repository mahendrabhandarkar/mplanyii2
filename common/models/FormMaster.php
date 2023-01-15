<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "form_master".
 *
 * @property int $form_id
 * @property string|null $form_field_id
 * @property string|null $form_field_name
 */
class FormMaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%form_master}}';
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
            [['form_field_id', 'form_field_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'form_id' => Yii::t('app', 'Form ID'),
            'form_field_id' => Yii::t('app', 'Form Field ID'),
            'form_field_name' => Yii::t('app', 'Form Field Name'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return FormMasterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FormMasterQuery(get_called_class());
    }
}