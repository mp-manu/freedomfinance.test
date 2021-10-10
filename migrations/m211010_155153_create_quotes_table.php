<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%quotes}}`.
 */
class m211010_155153_create_quotes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%quotes}}', [
            'id' => $this->primaryKey(),
            'ticker_id' => $this->integer()->notNull(),
            'bbp' => $this->double('2')->notNull(),
            'bap' => $this->double('2')->notNull(),
            'spred' => $this->double('2')->notNull(),
            'ltt' => $this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);

        $this->createIndex(
            'idx-quotes-ticker_id',
            'quotes',
            'ticker_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-quotes-ticker_id',
            'quotes',
            'ticker_id',
            'tickers',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%quotes}}');
    }
}
