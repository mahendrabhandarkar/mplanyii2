<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserFamily;

/**
 * UserFamilySearch represents the model behind the search form of `common\models\UserFamily`.
 */
class UserFamilySearch extends UserFamily
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'brother', 'sister'], 'integer'],
            [['father_name', 'mother_name', 'father_status', 'mother_status', 'family_status'], 'safe'],
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
        $query = UserFamily::find();

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
            'brother' => $this->brother,
            'sister' => $this->sister,
        ]);

        $query->andFilterWhere(['like', 'father_name', $this->father_name])
            ->andFilterWhere(['like', 'mother_name', $this->mother_name])
            ->andFilterWhere(['like', 'father_status', $this->father_status])
            ->andFilterWhere(['like', 'mother_status', $this->mother_status])
            ->andFilterWhere(['like', 'family_status', $this->family_status]);

        return $dataProvider;
    }
}
