<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Quotes;

/**
 * QuotesSearch represents the model behind the search form of `app\models\Quotes`.
 */
class QuotesSearch extends Quotes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ticker_id'], 'integer'],
            [['bbp', 'bap', 'spred'], 'number'],
            [['ltt', 'created_at', 'updated_at'], 'safe'],
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
        $query = Quotes::find()->with('ticker');

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
            'ticker_id' => $this->ticker_id,
            'bbp' => $this->bbp,
            'bap' => $this->bap,
            'spred' => $this->spred,
            'updated_at' => $this->updated_at,
        ]);

        if(!empty($this->created_at)){
            $dates = explode(' - ', $this->created_at);
            $query->andFilterWhere(['between',
                'created_at', $dates[0], $dates[1]
            ]);
        }

        if(!empty($this->ltt)){
            $dates = explode(' - ', $this->ltt);
            $query->andFilterWhere(['between',
                'ltt', $dates[0], $dates[1]
            ]);
        }

        return $dataProvider;
    }
}
