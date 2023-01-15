<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Community;

/**
 * CommunitySearch represents the model behind the search form of `common\models\Community`.
 */
class CommunitySearch extends Community
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'religion_id'], 'integer'],
            [['community_name'], 'safe'],
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
        $query = Community::find();

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
            'religion_id' => $this->religion_id,
        ]);

        $query->andFilterWhere(['like', 'community_name', $this->community_name]);

        return $dataProvider;
    }
}
