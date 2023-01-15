<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "product_api_configuration".
 *
 * @property int $api_configuration_id
 * @property int $product_configuration_id
 * @property int|null $refering_product_service_id
 */
class ProductApiConfiguration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%1_product_api_configuration}}';
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
            [['api_configuration_id', 'product_configuration_id'], 'required'],
            [['api_configuration_id', 'product_configuration_id', 'refering_product_service_id'], 'integer'],
            [['product_configuration_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'api_configuration_id' => Yii::t('app', 'Api Configuration ID'),
            'product_configuration_id' => Yii::t('app', 'Product Configuration ID'),
            'refering_product_service_id' => Yii::t('app', 'Refering Product Service ID'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ProductApiConfigurationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductApiConfigurationQuery(get_called_class());
    }
}