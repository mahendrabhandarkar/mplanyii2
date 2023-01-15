<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductApiConfiguration;

/**
 * ProductApiConfigurationSearch represents the model behind the search form of `common\models\ProductApiConfiguration`.
 */
class ProductApiConfigurationSearch extends ProductApiConfiguration
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['api_configuration_id', 'product_configuration_id', 'refering_product_service_id'], 'integer'],
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
        $query = ProductApiConfiguration::find();

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
            'product_configuration_id' => $this->product_configuration_id,
            'refering_product_service_id' => $this->refering_product_service_id,
        ]);

        return $dataProvider;
    }
}
