<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tickers".
 *
 * @property int $id
 * @property string|null $short_name
 * @property string|null $default_ticker
 * @property string|null $nt_ticker
 * @property string|null $first_date
 * @property string|null $currency
 * @property float|null $min_step
 */
class Tickers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_date'], 'safe'],
            [['min_step'], 'number'],
            [['short_name'], 'required', 'message' => 'Заполните название тикера'],
            [['short_name', 'nt_ticker'], 'string', 'max' => 255],
            [['default_ticker', 'currency'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ИД',
            'short_name' => 'Название тикера',
            'default_ticker' => 'Название тикера на бирже',
            'nt_ticker' => 'Название тикера внутри системы tradernet',
            'first_date' => 'Дата регистрации компании на бирже',
            'currency' => 'Валюта, в которой торгуется бумага',
            'min_step' => 'Минимальный шаг цены бумаги',
        ];
    }
}
