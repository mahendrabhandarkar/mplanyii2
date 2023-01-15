<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "product_configuration".
 *
 * @property int $product_configuration_id
 * @property int $product_id
 * @property int $product_service_id
 * @property string $product_configurable_columns
 * @property string|null $api_call
 * @property string|null $redirect
 * @property string|null $batch
 * @property string|null $display_to_customer
 * @property int $step
 * @property int|null $store_in_db
 * @property string|null $created_date
 * @property string|null $modified_date
 * @property string|null $created_by
 * @property string|null $modified_by
 *
 * @property ProductMaster $product
 * @property Service $productService
 */
class ProductConfiguration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%1_product_configuration}}';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        //    [
        //        'class' => BlameableBehavior::class,
        //        'updateByAttribute' => false
        //    ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'product_service_id', 'product_configurable_columns', 'step'], 'required'],
            [['product_id', 'product_service_id', 'step', 'store_in_db'], 'integer'],
            [['product_configurable_columns'], 'string'],
            [['created_date', 'modified_date'], 'safe'],
            [['api_call', 'redirect', 'batch', 'display_to_customer'], 'string', 'max' => 1],
            [['created_by', 'modified_by'], 'string', 'max' => 250],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductMaster::className(), 'targetAttribute' => ['product_id' => 'product_id']],
            [['product_service_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductService::className(), 'targetAttribute' => ['product_service_id' => 'product_service_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_configuration_id' => Yii::t('app', 'Product Configuration ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'product_service_id' => Yii::t('app', 'Product Service ID'),
            'product_configurable_columns' => Yii::t('app', 'Product Configurable Columns'),
            'api_call' => Yii::t('app', 'Api Call'),
            'redirect' => Yii::t('app', 'Redirect'),
            'batch' => Yii::t('app', 'Batch'),
            'display_to_customer' => Yii::t('app', 'Display To Customer'),
            'step' => Yii::t('app', 'Step'),
            'store_in_db' => Yii::t('app', 'Store In Db'),
            'created_date' => Yii::t('app', 'Created Date'),
            'modified_date' => Yii::t('app', 'Modified Date'),
            'created_by' => Yii::t('app', 'Created By'),
            'modified_by' => Yii::t('app', 'Modified By'),
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery|ProductMasterQuery
     */
    public function getProduct()
    {
        return $this->hasOne(ProductMaster::className(), ['product_id' => 'product_id']);
    }

    /**
     * Gets query for [[ProductService]].
     *
     * @return \yii\db\ActiveQuery|ServiceQuery
     */
    public function getProductService()
    {
        return $this->hasOne(ProductService::className(), ['product_service_id' => 'product_service_id']);
    }

    /**
     * {@inheritdoc}
     * @return ProductConfigurationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductConfigurationQuery(get_called_class());
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