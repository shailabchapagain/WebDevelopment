<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%unit}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%lesson}}`
 */
class m200509_030116_create_unit_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%unit}}', [
            'id' => $this->primaryKey(),
            'unitTitle' => $this->string(250)->notNull(),
            'unitText' => $this->text()->notNull(),
            'imageURL' => $this->string(512)->notNull(),
            'lessonID' => $this->integer()->notNull(),
        ]);

        // creates index for column `lessonID`
        $this->createIndex(
            '{{%idx-unit-lessonID}}',
            '{{%unit}}',
            'lessonID'
        );

        // add foreign key for table `{{%lesson}}`
        $this->addForeignKey(
            '{{%fk-unit-lessonID}}',
            '{{%unit}}',
            'lessonID',
            '{{%lesson}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%lesson}}`
        $this->dropForeignKey(
            '{{%fk-unit-lessonID}}',
            '{{%unit}}'
        );

        // drops index for column `lessonID`
        $this->dropIndex(
            '{{%idx-unit-lessonID}}',
            '{{%unit}}'
        );

        $this->dropTable('{{%unit}}');
    }
}
