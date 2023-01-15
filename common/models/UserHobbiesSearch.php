<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserHobbies;

/**
 * UserHobbiesSearch represents the model behind the search form of `common\models\UserHobbies`.
 */
class UserHobbiesSearch extends UserHobbies
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['hobbies', 'interests', 'fav_music', 'fav_books', 'pre_movies', 'cook_food', 'own_words'], 'safe'],
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
        $query = UserHobbies::find();

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
        ]);

        $query->andFilterWhere(['like', 'hobbies', $this->hobbies])
            ->andFilterWhere(['like', 'interests', $this->interests])
            ->andFilterWhere(['like', 'fav_music', $this->fav_music])
            ->andFilterWhere(['like', 'fav_books', $this->fav_books])
            ->andFilterWhere(['like', 'pre_movies', $this->pre_movies])
            ->andFilterWhere(['like', 'cook_food', $this->cook_food])
            ->andFilterWhere(['like', 'own_words', $this->own_words]);

        return $dataProvider;
    }
}
