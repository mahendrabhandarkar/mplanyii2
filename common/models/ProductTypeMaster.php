<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "product_type_master".
 *
 * @property int $product_type_id
 * @property string $product_type
 * @property string|null $product_type_description
 * @property string|null $created_date
 * @property string|null $modified_date
 * @property string|null $created_by
 * @property string|null $modified_by
 *
 * @property ProductMaster[] $productMasters
 * @property ProductTypeConfiguration[] $productTypeConfigurations
 */
class ProductTypeMaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%1_product_type_master}}';
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
            [['product_type'], 'required'],
            [['created_date', 'modified_date'], 'safe'],
            [['product_type', 'product_type_description', 'created_by', 'modified_by'], 'string', 'max' => 250],
            [['product_type'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_type_id' => Yii::t('app', 'Product Type ID'),
            'product_type' => Yii::t('app', 'Product Type'),
            'product_type_description' => Yii::t('app', 'Product Type Description'),
            'created_date' => Yii::t('app', 'Created Date'),
            'modified_date' => Yii::t('app', 'Modified Date'),
            'created_by' => Yii::t('app', 'Created By'),
            'modified_by' => Yii::t('app', 'Modified By'),
        ];
    }

    /**
     * Gets query for [[ProductMasters]].
     *
     * @return \yii\db\ActiveQuery|ProductMasterQuery
     */
    public function getProductMasters()
    {
        return $this->hasMany(ProductMaster::className(), ['product_type_id' => 'product_type_id']);
    }

    /**
     * Gets query for [[ProductTypeConfigurations]].
     *
     * @return \yii\db\ActiveQuery|ProductTypeConfigurationQuery
     */
    public function getProductTypeConfigurations()
    {
        return $this->hasMany(ProductTypeConfiguration::className(), ['product_type_id' => 'product_type_id']);
    }

    /**
     * {@inheritdoc}
     * @return ProductTypeMasterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductTypeMasterQuery(get_called_class());
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