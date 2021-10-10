<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tickers}}`.
 */
class m211008_101052_create_tickers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tickers}}', [
            'id' => $this->primaryKey(),
            'short_name' => $this->string('255'),
            'default_ticker' => $this->string('25'),
            'nt_ticker' => $this->string('255'),
            'first_date' => $this->dateTime(),
            'currency' => $this->string('25'),
            'min_step' => $this->float('4,2')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tickers}}');
    }
}
