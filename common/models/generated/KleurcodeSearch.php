<?php

namespace common\models\generated;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Kleurcode;

/**
 * KleurcodeSearch represents the model behind the search form of `common\models\Kleurcode`.
 */
class KleurcodeSearch extends Kleurcode
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'useridint', 'created_by_userid', 'updated_by_userid'], 'integer'],
            [['kleur', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return (new Model)->scenarios(); 
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
        $query = Kleurcode::find();

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
            'useridint' => $this->useridint,
            'created_by_userid' => $this->created_by_userid,
            'created_at' => $this->created_at,
            'updated_by_userid' => $this->updated_by_userid,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'kleur', $this->kleur]);

        return $dataProvider;
    }
}
