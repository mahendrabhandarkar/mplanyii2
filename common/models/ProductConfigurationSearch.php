<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductConfiguration;

/**
 * ProductConfigurationSearch represents the model behind the search form of `common\models\ProductConfiguration`.
 */
class ProductConfigurationSearch extends ProductConfiguration
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_configuration_id', 'product_id', 'product_service_id', 'step', 'store_in_db'], 'integer'],
            [['product_configurable_columns', 'api_call', 'redirect', 'batch', 'display_to_customer', 'created_date', 'modified_date', 'created_by', 'modified_by'], 'safe'],
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
        $query = ProductConfiguration::find();

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
            'product_configuration_id' => $this->product_configuration_id,
            'product_id' => $this->product_id,
            'product_service_id' => $this->product_service_id,
            'step' => $this->step,
            'store_in_db' => $this->store_in_db,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'product_configurable_columns', $this->product_configurable_columns])
            ->andFilterWhere(['like', 'api_call', $this->api_call])
            ->andFilterWhere(['like', 'redirect', $this->redirect])
            ->andFilterWhere(['like', 'batch', $this->batch])
            ->andFilterWhere(['like', 'display_to_customer', $this->display_to_customer])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'modified_by', $this->modified_by]);

        return $dataProvider;
    }
}
