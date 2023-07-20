<?php

namespace common\models\generated;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Klant;

/**
 * KlantSearch represents the model behind the search form of `common\models\Klant`.
 */
class KlantSearch extends Klant
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['klantid', 'gemeenid', 'created_by_userid', 'updated_by_userid','aantalherstellingen'], 'integer'],
            [['klantnaam', 'straat', 'nr', 'email', 'tel', 'klantopmerkingen', 'created_at', 'updated_at','aantalherstellingen'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return  (new Model)->scenarios(); 
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
        $query = Klant::find()
            ->select([
                'klant.*',
                'count({{herstelling}}.id) as aantalherstellingen '
            ])
            ->joinWith(['gemeen'])
            ->joinWith('herstellings')
            ->groupBy('klant.klantid');


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'klantid',
                'klantnaam',
                'straat',
                'nr',
                'gemeenid',
                'email',
                'tel',
                'aantalherstellingen'
            ],
            'defaultOrder' => ['klantid' => SORT_ASC]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'klant.klantid' => $this->klantid,
            'gemeenid' => $this->gemeenid,
            'created_by_userid' => $this->created_by_userid,
            'created_at' => $this->created_at,
            'updated_by_userid' => $this->updated_by_userid,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'klantnaam', $this->klantnaam])
            ->andFilterWhere(['like', 'straat', $this->straat])
            ->andFilterWhere(['like', 'nr', $this->nr])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'klantopmerkingen', $this->klantopmerkingen]);
        $query->andFilterHaving(['aantalherstellingen' => $this->aantalherstellingen]);


        return $dataProvider;
    }
}
