<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ApiConfiguration;

/**
 * ApiConfigurationSearch represents the model behind the search form of `common\models\ApiConfiguration`.
 */
class ApiConfigurationSearch extends ApiConfiguration
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['api_configuration_id'], 'integer'],
            [['api_name', 'authentication_type', 'username', 'password', 'access_token', 'token_endpoint', 'endpoint_name', 'use_as', 'error_handling', 'data_type', 'api_method', 'api_endpoint_url', 'headers', 'parameters', 'accept', 'content_type', 'created_date', 'modified_date', 'created_by', 'modified_by', 'request_response_configurable'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ApiConfiguration::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'api_configuration_id' => $this->api_configuration_id,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'api_name', $this->api_name])
            ->andFilterWhere(['like', 'authentication_type', $this->authentication_type])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'access_token', $this->access_token])
            ->andFilterWhere(['like', 'token_endpoint', $this->token_endpoint])
            ->andFilterWhere(['like', 'endpoint_name', $this->endpoint_name])
            ->andFilterWhere(['like', 'use_as', $this->use_as])
            ->andFilterWhere(['like', 'error_handling', $this->error_handling])
            ->andFilterWhere(['like', 'data_type', $this->data_type])
            ->andFilterWhere(['like', 'api_method', $this->api_method])
            ->andFilterWhere(['like', 'api_endpoint_url', $this->api_endpoint_url])
            ->andFilterWhere(['like', 'headers', $this->headers])
            ->andFilterWhere(['like', 'parameters', $this->parameters])
            ->andFilterWhere(['like', 'accept', $this->accept])
            ->andFilterWhere(['like', 'content_type', $this->content_type])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'modified_by', $this->modified_by])
            ->andFilterWhere(['like', 'request_response_configurable', $this->request_response_configurable]);

        return $dataProvider;
    }
}
