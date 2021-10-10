<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quotes".
 *
 * @property int $id
 * @property int $ticker_id
 * @property float $bbp
 * @property float $bap
 * @property float $spred
 * @property string|null $ltt
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Tickers $ticker
 */
class Quotes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quotes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ticker_id', 'bbp', 'bap', 'spred'], 'required'],
            [['ticker_id'], 'integer'],
            [['bbp', 'bap', 'spred'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['ltt'], 'string', 'max' => 255],
            [['ticker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tickers::className(), 'targetAttribute' => ['ticker_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ticker_id' => 'Тикер',
            'bbp' => 'Лучший бид (bbp)',
            'bap' => 'Лучшее предложение (bap)',
            'spred' => 'Cпред. (bap - bbp)/bap)',
            'ltt' => 'Дата и время',
            'created_at' => 'Добавлено',
            'updated_at' => 'Обновлено',
        ];
    }

    /**
     * Gets query for [[Ticker]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTicker()
    {
        return $this->hasOne(Tickers::className(), ['id' => 'ticker_id']);
    }

    public function getSpred() {
        return $this->spred = round(($this->bap - $this->bbp) / $this->bap, 6);
    }
}
