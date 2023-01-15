<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PartnerEdu;

/**
 * PartnerEduSearch represents the model behind the search form of `common\models\PartnerEdu`.
 */
class PartnerEduSearch extends PartnerEdu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'pedu_level_id', 'pedu_field_id', 'pwork_with_id', 'pwork_as_id', 'pannual_income'], 'integer'],
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
        $query = PartnerEdu::find();

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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'pedu_level_id' => $this->pedu_level_id,
            'pedu_field_id' => $this->pedu_field_id,
            'pwork_with_id' => $this->pwork_with_id,
            'pwork_as_id' => $this->pwork_as_id,
            'pannual_income' => $this->pannual_income,
        ]);

        return $dataProvider;
    }
}
