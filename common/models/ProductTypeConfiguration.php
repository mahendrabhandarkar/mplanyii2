<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "product_type_configuration".
 *
 * @property int $product_type_configuration_id
 * @property int $product_type_id
 * @property string $product_type_configurable_columns
 * @property string|null $created_date
 * @property string|null $modified_date
 * @property string|null $created_by
 * @property string|null $modified_by
 *
 * @property ProductTypeMaster $productType
 */
class ProductTypeConfiguration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%1_product_type_configuration}}';
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
            [['product_type_id', 'product_type_configurable_columns'], 'required'],
            [['product_type_id'], 'integer'],
            [['product_type_configurable_columns'], 'string'],
            [['created_date', 'modified_date'], 'safe'],
            [['created_by', 'modified_by'], 'string', 'max' => 250],
            [['product_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductTypeMaster::className(), 'targetAttribute' => ['product_type_id' => 'product_type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_type_configuration_id' => Yii::t('app', 'Product Type Configuration ID'),
            'product_type_id' => Yii::t('app', 'Product Type ID'),
            'product_type_configurable_columns' => Yii::t('app', 'Product Type Configurable Columns'),
            'created_date' => Yii::t('app', 'Created Date'),
            'modified_date' => Yii::t('app', 'Modified Date'),
            'created_by' => Yii::t('app', 'Created By'),
            'modified_by' => Yii::t('app', 'Modified By'),
        ];
    }

    /**
     * Gets query for [[ProductType]].
     *
     * @return \yii\db\ActiveQuery|ProductTypeMasterQuery
     */
    public function getProductType()
    {
        return $this->hasOne(ProductTypeMaster::className(), ['product_type_id' => 'product_type_id']);
    }

    /**
     * {@inheritdoc}
     * @return ProductTypeConfigurationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductTypeConfigurationQuery(get_called_class());
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