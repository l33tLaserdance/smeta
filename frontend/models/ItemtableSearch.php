<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Itemtable;

/**
 * ItemtableSearch represents the model behind the search form of `frontend\models\Itemtable`.
 */
class ItemtableSearch extends Itemtable
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ItemID', 'ItemArt', 'ItemCost', 'TypeID'], 'integer'],
            [['ItemName', 'ItemInfo', 'ItemMeasurement'], 'safe'],
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
        $query = Itemtable::find();

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
            'ItemArt' => $this->ItemArt,
            'ItemCost' => $this->ItemCost,
            'TypeID' => $this->TypeID,
        ]);

        $query->andFilterWhere(['like', 'ItemName', $this->ItemName])
            ->andFilterWhere(['like', 'ItemInfo', $this->ItemInfo])
            ->andFilterWhere(['like', 'ItemMeasurement', $this->ItemMeasurement]);

        return $dataProvider;
    }
}
