<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserProfiles;

/**
 * UserProfilesSearch represents the model behind the search form of `common\models\UserProfiles`.
 */
class UserProfilesSearch extends UserProfiles
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'mother_tongue_id', 'religion_id', 'country_id', 'state_id', 'city_id', 'profile_complete'], 'integer'],
            [['website', 'marital_status', 'height', 'skin_tone', 'body_type', 'diet', 'smoke', 'drink', 'own_words', 'disability', 'hiv_positive'], 'safe'],
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
        $query = UserProfiles::find();

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
            'mother_tongue_id' => $this->mother_tongue_id,
            'religion_id' => $this->religion_id,
            'country_id' => $this->country_id,
            'state_id' => $this->state_id,
            'city_id' => $this->city_id,
            'profile_complete' => $this->profile_complete,
        ]);

        $query->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'height', $this->height])
            ->andFilterWhere(['like', 'skin_tone', $this->skin_tone])
            ->andFilterWhere(['like', 'body_type', $this->body_type])
            ->andFilterWhere(['like', 'diet', $this->diet])
            ->andFilterWhere(['like', 'smoke', $this->smoke])
            ->andFilterWhere(['like', 'drink', $this->drink])
            ->andFilterWhere(['like', 'own_words', $this->own_words])
            ->andFilterWhere(['like', 'disability', $this->disability])
            ->andFilterWhere(['like', 'hiv_positive', $this->hiv_positive]);

        return $dataProvider;
    }
}
