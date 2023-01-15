<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PartnerBackground;

/**
 * PartnerBackgroundSearch represents the model behind the search form of `common\models\PartnerBackground`.
 */
class PartnerBackgroundSearch extends PartnerBackground
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'preligion_id', 'pcommunity_id'], 'integer'],
            [['psub_community'], 'safe'],
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
        $query = PartnerBackground::find();

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
            'preligion_id' => $this->preligion_id,
            'pcommunity_id' => $this->pcommunity_id,
        ]);

        $query->andFilterWhere(['like', 'psub_community', $this->psub_community]);

        return $dataProvider;
    }
}
