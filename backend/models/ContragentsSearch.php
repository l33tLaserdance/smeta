<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Contragents;

/**
 * ContragentsSearch represents the model behind the search form of `backend\models\Contragents`.
 */
class ContragentsSearch extends Contragents
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CID', 'INN', 'KPP', 'OGRN'], 'integer'],
            [['ContrName', 'ContrFullName'], 'safe'],
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
        $query = Contragents::find();

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
            'CID' => $this->CID,
            'INN' => $this->INN,
            'KPP' => $this->KPP,
            'OGRN' => $this->OGRN,
        ]);

        $query->andFilterWhere(['like', 'ContrName', $this->ContrName])
            ->andFilterWhere(['like', 'ContrFullName', $this->ContrFullName]);

        return $dataProvider;
    }
}
