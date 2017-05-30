<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m170527_212000_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->string(150)->notNull(),
            'img' => $this->string()->notNull(),
            'text' => $this->text()->notNull(),
            'hits' => $this->integer()->notNull()->defaultValue(0),
            'hide' => $this->integer()->notNull()->defaultValue(1),
            'date' => $this->timestamp()->notNull(),
            'date_up' => $this->datetime(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news');
    }
}
