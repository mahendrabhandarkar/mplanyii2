<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "asset_upload".
 *
 * @property int $layout_id
 * @property string $layout_name
 * @property string $image_name
 * @property string $image_path
 * @property int|null $layout_status
 * @property string $option_description
 * @property string|null $created_date
 * @property string|null $modified_date
 * @property string|null $created_by
 * @property string|null $modified_by
 */
class AssetUpload extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%1_asset_upload}}';
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
            [['layout_name', 'image_name', 'image_path', 'option_description'], 'required'],
            [['layout_status'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['layout_name', 'image_name', 'image_path', 'option_description', 'created_by', 'modified_by'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'layout_id' => Yii::t('app', 'Layout ID'),
            'layout_name' => Yii::t('app', 'Layout Name'),
            'image_name' => Yii::t('app', 'Image Name'),
            'image_path' => Yii::t('app', 'Image Path'),
            'layout_status' => Yii::t('app', 'Layout Status'),
            'option_description' => Yii::t('app', 'Option Description'),
            'created_date' => Yii::t('app', 'Created Date'),
            'modified_date' => Yii::t('app', 'Modified Date'),
            'created_by' => Yii::t('app', 'Created By'),
            'modified_by' => Yii::t('app', 'Modified By'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return AssetUploadQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AssetUploadQuery(get_called_class());
    }

    public function getCreatedBy()
    {
        return $this->hasOne(AdminUser::className(), ['id' => 'created_by']);
    }

    public function afterFind()
    {
        parent::afterFind();
        if (!empty($this->created_date))
            $this->created_date = Yii::$app->formatter->asDate($this->created_date);
        if (!empty($this->modified_date))
            $this->modified_date = Yii::$app->formatter->asDate($this->modified_date);
        $this->modified_by = Yii::$app->user->id;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->created_date = Yii::$app->formatter->asTimestamp($this->created_date);
            $this->modified_date = Yii::$app->formatter->asTimestamp($this->modified_date);
            $this->modified_by = Yii::$app->user->id;
            return true;
        } else {
            return false;
        }
    }
}