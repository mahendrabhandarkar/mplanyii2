<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductTypeMaster;

/**
 * ProductTypeMasterSearch represents the model behind the search form of `common\models\ProductTypeMaster`.
 */
class ProductTypeMasterSearch extends ProductTypeMaster
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_type_id'], 'integer'],
            [['product_type', 'product_type_description', 'created_date', 'modified_date', 'created_by', 'modified_by'], 'safe'],
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
        $query = ProductTypeMaster::find();

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
            'product_type_id' => $this->product_type_id,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
        ]);

        $query->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'product_type_description', $this->product_type_description])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'modified_by', $this->modified_by]);

        return $dataProvider;
    }
}
