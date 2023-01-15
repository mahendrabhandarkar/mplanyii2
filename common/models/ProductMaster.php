<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "product_master".
 *
 * @property int $product_id
 * @property int $product_type_id
 * @property string $product_name
 * @property string $product_description
 * @property string|null $created_by
 * @property string|null $created_date
 * @property string|null $modified_by
 * @property string|null $modified_date
 * @property string|null $product_feature
 * @property string|null $image_path
 * @property int|null $kyc_required
 * @property int|null $isagentlogin_required
 * @property string|null $product_details_image
 * @property string|null $product_header_logo
 * @property string|null $product_service
 * @property bool|null $isencryption_required
 * @property int|null $ekyc_service
 *
 * @property ProductConfiguration[] $productConfigurations
 * @property ProductTypeMaster $productType
 */
class ProductMaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%1_product_master}}';
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
            [['product_type_id', 'product_name', 'product_description'], 'required'],
            [['product_type_id', 'kyc_required', 'isagentlogin_required', 'ekyc_service'], 'integer'],
            [['created_date', 'modified_date'], 'safe'],
            [['isencryption_required'], 'boolean'],
            [['product_name', 'product_description', 'created_by', 'modified_by', 'image_path'], 'string', 'max' => 250],
            [['product_feature'], 'string', 'max' => 300],
            [['product_details_image', 'product_header_logo', 'product_service'], 'string', 'max' => 255],
            [['product_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductTypeMaster::className(), 'targetAttribute' => ['product_type_id' => 'product_type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'product_type_id' => Yii::t('app', 'Product Type ID'),
            'product_name' => Yii::t('app', 'Product Name'),
            'product_description' => Yii::t('app', 'Product Description'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_date' => Yii::t('app', 'Created Date'),
            'modified_by' => Yii::t('app', 'Modified By'),
            'modified_date' => Yii::t('app', 'Modified Date'),
            'product_feature' => Yii::t('app', 'Product Feature'),
            'image_path' => Yii::t('app', 'Image Path'),
            'kyc_required' => Yii::t('app', 'Kyc Required'),
            'isagentlogin_required' => Yii::t('app', 'Isagentlogin Required'),
            'product_details_image' => Yii::t('app', 'Product Details Image'),
            'product_header_logo' => Yii::t('app', 'Product Header Logo'),
            'product_service' => Yii::t('app', 'Product Service'),
            'isencryption_required' => Yii::t('app', 'Isencryption Required'),
            'ekyc_service' => Yii::t('app', 'Ekyc Service'),
        ];
    }

    /**
     * Gets query for [[ProductConfigurations]].
     *
     * @return \yii\db\ActiveQuery|ProductConfigurationQuery
     */
    public function getProductConfigurations()
    {
        return $this->hasMany(ProductConfiguration::className(), ['product_id' => 'product_id']);
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
     * @return ProductMasterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductMasterQuery(get_called_class());
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