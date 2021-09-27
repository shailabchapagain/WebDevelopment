<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%university}}`.
 */
class m200508_234456_create_university_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%university}}', [
            'id' => $this->primaryKey(),
            'universityname' => $this->string(255)->notNull()->unique(),
            'universitycountry' => $this->string(45)->notnull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%university}}');
    }
}
