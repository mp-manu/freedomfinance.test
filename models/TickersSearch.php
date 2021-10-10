<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tickers;

/**
 * TickersSearch represents the model behind the search form of `app\models\Tickers`.
 */
class TickersSearch extends Tickers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['short_name', 'default_ticker', 'nt_ticker', 'first_date', 'currency'], 'safe'],
            [['min_step'], 'number'],
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
        $query = Tickers::find();

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
            'first_date' => $this->first_date,
            'min_step' => $this->min_step,
        ]);

        $query->andFilterWhere(['like', 'short_name', $this->short_name])
            ->andFilterWhere(['like', 'default_ticker', $this->default_ticker])
            ->andFilterWhere(['like', 'nt_ticker', $this->nt_ticker])
            ->andFilterWhere(['like', 'currency', $this->currency]);

        return $dataProvider;
    }
}
