<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%language}}`.
 */
class m200509_013246_create_language_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%language}}', [
            'ISO' => $this->string(2),
            'language' => $this->string(100)->notNull(),
        ]);

        $this->addPrimaryKey('PK_ISO','language','ISO');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%language}}');
    }


}
