<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%newsletter}}`.
 */
class m200508_234437_create_newsletter_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%newsletter}}', [
            'id' => $this->primaryKey(),
            'newsletteremail' => $this->string(255)->notNull(),
            'subscribed_on' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%newsletter}}');
    }
}
