<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "product_service".
 *
 * @property int $product_service_id
 * @property int|null $no_of_steps
 * @property bool|null $override
 * @property int|null $product_id
 * @property string|null $service_name
 * @property int|null $customer_selection_show
 * @property string|null $service_image_path
 * @property int|null $service_status
 *
 * @property ProductConfiguration[] $productConfigurations
 */
class ProductService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%1_product_service}}';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        //    [
            //    'class' => BlameableBehavior::class,
                
        //    ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['no_of_steps', 'product_id', 'customer_selection_show', 'service_status'], 'integer'],
            [['override'], 'boolean'],
            [['service_name', 'service_image_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_service_id' => Yii::t('app', 'Product Service ID'),
            'no_of_steps' => Yii::t('app', 'No Of Steps'),
            'override' => Yii::t('app', 'Override'),
            'product_id' => Yii::t('app', 'Product ID'),
            'service_name' => Yii::t('app', 'Service Name'),
            'customer_selection_show' => Yii::t('app', 'Customer Selection Show'),
            'service_image_path' => Yii::t('app', 'Service Image Path'),
            'service_status' => Yii::t('app', 'Service Status'),
        ];
    }

    /**
     * Gets query for [[ProductConfigurations]].
     *
     * @return \yii\db\ActiveQuery|ProductConfigurationQuery
     */
    public function getProductConfigurations()
    {
        return $this->hasMany(ProductConfiguration::className(), ['product_service_id' => 'product_service_id']);
    }

    /**
     * {@inheritdoc}
     * @return ProductServiceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductServiceQuery(get_called_class());
    }
}