<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductMaster;

/**
 * ProductMasterSearch represents the model behind the search form of `common\models\ProductMaster`.
 */
class ProductMasterSearch extends ProductMaster
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'product_type_id', 'kyc_required', 'isagentlogin_required', 'ekyc_service'], 'integer'],
            [['product_name', 'product_description', 'created_by', 'created_date', 'modified_by', 'modified_date', 'product_feature', 'image_path', 'product_details_image', 'product_header_logo', 'product_service'], 'safe'],
            [['isencryption_required'], 'boolean'],
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
        $query = ProductMaster::find();

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
            'product_id' => $this->product_id,
            'product_type_id' => $this->product_type_id,
            'created_date' => $this->created_date,
            'modified_date' => $this->modified_date,
            'kyc_required' => $this->kyc_required,
            'isagentlogin_required' => $this->isagentlogin_required,
            'isencryption_required' => $this->isencryption_required,
            'ekyc_service' => $this->ekyc_service,
        ]);

        $query->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'product_description', $this->product_description])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'modified_by', $this->modified_by])
            ->andFilterWhere(['like', 'product_feature', $this->product_feature])
            ->andFilterWhere(['like', 'image_path', $this->image_path])
            ->andFilterWhere(['like', 'product_details_image', $this->product_details_image])
            ->andFilterWhere(['like', 'product_header_logo', $this->product_header_logo])
            ->andFilterWhere(['like', 'product_service', $this->product_service]);

        return $dataProvider;
    }
}
