<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Users;

/**
 * UsersSearch represents the model behind the search form of `common\models\Users`.
 */
class UsersSearch extends Users
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'activated', 'banned', 'last_login', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'email', 'mobile_no', 'profile_for', 'gender', 'dob', 'ban_reason', 'new_password_key', 'new_password_requested', 'new_email', 'new_email_key', 'last_ip', 'firstname', 'lastname', 'auth_key', 'password_hash', 'password_reset_token', 'verification_token'], 'safe'],
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
        $query = Users::find();

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
            'activated' => $this->activated,
            'banned' => $this->banned,
            'new_password_requested' => $this->new_password_requested,
            'last_login' => $this->last_login,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'mobile_no', $this->mobile_no])
            ->andFilterWhere(['like', 'profile_for', $this->profile_for])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'dob', $this->dob])
            ->andFilterWhere(['like', 'ban_reason', $this->ban_reason])
            ->andFilterWhere(['like', 'new_password_key', $this->new_password_key])
            ->andFilterWhere(['like', 'new_email', $this->new_email])
            ->andFilterWhere(['like', 'new_email_key', $this->new_email_key])
            ->andFilterWhere(['like', 'last_ip', $this->last_ip])
            ->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'verification_token', $this->verification_token]);

        return $dataProvider;
    }
}
