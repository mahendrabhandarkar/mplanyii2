<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PartnerBasic;

/**
 * PartnerBasicSearch represents the model behind the search form of `common\models\PartnerBasic`.
 */
class PartnerBasicSearch extends PartnerBasic
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'pcountry_id', 'pstate_id', 'pcity_id', 'pmtongue_id', 'page', 'pageto', 'pheightto', 'pheight', 'pprofile_complete'], 'integer'],
            [['pmarital_status', 'pskin_tone', 'pbody_type', 'pdisability', 'phiv_positive'], 'safe'],
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
        $query = PartnerBasic::find();

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
            'pcountry_id' => $this->pcountry_id,
            'pstate_id' => $this->pstate_id,
            'pcity_id' => $this->pcity_id,
            'pmtongue_id' => $this->pmtongue_id,
            'page' => $this->page,
            'pageto' => $this->pageto,
            'pheightto' => $this->pheightto,
            'pheight' => $this->pheight,
            'pprofile_complete' => $this->pprofile_complete,
        ]);

        $query->andFilterWhere(['like', 'pmarital_status', $this->pmarital_status])
            ->andFilterWhere(['like', 'pskin_tone', $this->pskin_tone])
            ->andFilterWhere(['like', 'pbody_type', $this->pbody_type])
            ->andFilterWhere(['like', 'pdisability', $this->pdisability])
            ->andFilterWhere(['like', 'phiv_positive', $this->phiv_positive]);

        return $dataProvider;
    }
}
