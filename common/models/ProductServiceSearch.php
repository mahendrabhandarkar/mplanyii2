<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductService;

/**
 * ProductServiceSearch represents the model behind the search form of `common\models\ProductService`.
 */
class ProductServiceSearch extends ProductService
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_service_id', 'no_of_steps', 'product_id', 'customer_selection_show', 'service_status'], 'integer'],
            [['override'], 'boolean'],
            [['service_name', 'service_image_path'], 'safe'],
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
        $query = ProductService::find();

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
            'product_service_id' => $this->product_service_id,
            'no_of_steps' => $this->no_of_steps,
            'override' => $this->override,
            'product_id' => $this->product_id,
            'customer_selection_show' => $this->customer_selection_show,
            'service_status' => $this->service_status,
        ]);

        $query->andFilterWhere(['like', 'service_name', $this->service_name])
            ->andFilterWhere(['like', 'service_image_path', $this->service_image_path]);

        return $dataProvider;
    }
}
