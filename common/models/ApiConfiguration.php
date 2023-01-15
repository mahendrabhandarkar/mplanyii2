<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use Yii;

/**
 * This is the model class for table "api_configuration".
 *
 * @property int $api_configuration_id
 * @property string $api_name
 * @property string $authentication_type
 * @property string|null $username
 * @property string|null $password
 * @property string|null $access_token
 * @property string|null $token_endpoint
 * @property string|null $endpoint_name
 * @property string|null $use_as
 * @property string|null $error_handling
 * @property string|null $data_type
 * @property string $api_method
 * @property string $api_endpoint_url
 * @property string $headers
 * @property string $parameters
 * @property string|null $accept
 * @property string|null $content_type
 * @property string|null $created_date
 * @property string|null $modified_date
 * @property string|null $created_by
 * @property string|null $modified_by
 * @property string|null $request_response_configurable
 */
class ApiConfiguration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%1_api_configuration}}';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        //    [
        //        'class' => BlameableBehavior::class,
        //    ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['api_name', 'authentication_type', 'api_method', 'api_endpoint_url', 'headers', 'parameters'], 'required'],
            [['error_handling', 'api_endpoint_url', 'headers', 'parameters', 'request_response_configurable'], 'string'],
            [['created_date', 'modified_date'], 'safe'],
            [['api_name', 'authentication_type', 'username', 'password', 'access_token', 'token_endpoint', 'endpoint_name', 'use_as', 'data_type', 'accept', 'content_type', 'created_by', 'modified_by'], 'string', 'max' => 250],
            [['api_method'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'api_configuration_id' => Yii::t('app', 'Api Configuration ID'),
            'api_name' => Yii::t('app', 'Api Name'),
            'authentication_type' => Yii::t('app', 'Authentication Type'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'access_token' => Yii::t('app', 'Access Token'),
            'token_endpoint' => Yii::t('app', 'Token Endpoint'),
            'endpoint_name' => Yii::t('app', 'Endpoint Name'),
            'use_as' => Yii::t('app', 'Use As'),
            'error_handling' => Yii::t('app', 'Error Handling'),
            'data_type' => Yii::t('app', 'Data Type'),
            'api_method' => Yii::t('app', 'Api Method'),
            'api_endpoint_url' => Yii::t('app', 'Api Endpoint Url'),
            'headers' => Yii::t('app', 'Headers'),
            'parameters' => Yii::t('app', 'Parameters'),
            'accept' => Yii::t('app', 'Accept'),
            'content_type' => Yii::t('app', 'Content Type'),
            'created_date' => Yii::t('app', 'Created Date'),
            'modified_date' => Yii::t('app', 'Modified Date'),
            'created_by' => Yii::t('app', 'Created By'),
            'modified_by' => Yii::t('app', 'Modified By'),
            'request_response_configurable' => Yii::t('app', 'Request Response Configurable'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ApiConfigurationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ApiConfigurationQuery(get_called_class());
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