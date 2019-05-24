<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Smeta;

/**
 * SmetaSearch represents the model behind the search form of `frontend\models\Smeta`.
 */
class SmetaSearch extends Smeta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ItemID', 'Amount', 'ItemCost', 'ItemSumm', 'ServiceCost', 'ServiceSumm'], 'integer'],
            [['ItemName', 'ItemMeasurement', 'ServiceName'], 'safe'],
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
        $query = Smeta::find();

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
            'ItemID' => $this->ItemID,
            'Amount' => $this->Amount,
            'ItemCost' => $this->ItemCost,
            'ItemSumm' => $this->ItemSumm,
            'ServiceCost' => $this->ServiceCost,
            'ServiceSumm' => $this->ServiceSumm,
        ]);

        $query->andFilterWhere(['like', 'ItemName', $this->ItemName])
            ->andFilterWhere(['like', 'ItemMeasurement', $this->ItemMeasurement])
            ->andFilterWhere(['like', 'ServiceName', $this->ServiceName]);

        return $dataProvider;
    }
}
