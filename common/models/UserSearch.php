<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class UserSearch extends User
{
    public function rules()
    {
        // Define the search validation rules
        return [
            [['id'], 'integer'],
            [['username', 'email', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // Define different scenarios for searching
        return Model::scenarios();
    }

    public function search($params)
    {
        // Create a new ActiveDataProvider instance to fetch data from the User model
        $query = User::find();

        // Set up sorting
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC], // Default sorting order
            ],
            'pagination' => [
                'pageSize' => 20, // Number of items per page
            ],
        ]);

        // Load the search form data and validate
        if (!$this->load($params) || !$this->validate()) {
            return $dataProvider;
        }

        // Adjust the query based on the search form data
        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'username', $this->username]);
        $query->andFilterWhere(['like', 'email', $this->email]);
        $query->andFilterWhere(['like', 'created_at', $this->created_at]);
        $query->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}
