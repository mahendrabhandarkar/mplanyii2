<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FormMaster;

/**
 * FormMasterSearch represents the model behind the search form of `common\models\FormMaster`.
 */
class FormMasterSearch extends FormMaster
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['form_id'], 'integer'],
            [['form_field_id', 'form_field_name'], 'safe'],
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
        $query = FormMaster::find();

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
            'form_id' => $this->form_id,
        ]);

        $query->andFilterWhere(['like', 'form_field_id', $this->form_field_id])
            ->andFilterWhere(['like', 'form_field_name', $this->form_field_name]);

        return $dataProvider;
    }
}
