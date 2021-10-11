<?php

use yii\db\Migration;

/**
 * Class m211011_035036_insert_test_tickers
 */
class m211011_035036_insert_test_tickers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand()->batchInsert('tickers', ['short_name', 'default_ticker', 'nt_ticker', 'first_date', 'currency', 'min_step'], [
            ['MOEX', 'MOEX', 'MOEX', '2021-10-11', 'USD', '1'],
            ['SBER', 'SBER', 'SBER', '2021-10-11', 'RUB', '1'],
            ['ETLN', 'ETLN', 'ETLN', '2021-10-11', 'USD', '1'],
            ['YNDX', 'YNDX', 'YNDX', '2021-10-11', 'RUB', '1'],
        ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211011_035036_insert_test_tickers cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211011_035036_insert_test_tickers cannot be reverted.\n";

        return false;
    }
    */
}
