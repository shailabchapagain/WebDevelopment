<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lesson}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%course}}`
 */
class m200509_025811_create_lesson_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lesson}}', [
            'id' => $this->primaryKey(),
            'lessonTitle' => $this->string(255)->notNull(),
            'lessonDescription' => $this->string(2048)->notNull(),
            'courseID' => $this->integer()->notNull(),
            'order' => $this->integer()->notNull(),
        ]);

        // creates index for column `courseID`
        $this->createIndex(
            '{{%idx-lesson-courseID}}',
            '{{%lesson}}',
            'courseID'
        );

        // add foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-lesson-courseID}}',
            '{{%lesson}}',
            'courseID',
            '{{%course}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%course}}`
        $this->dropForeignKey(
            '{{%fk-lesson-courseID}}',
            '{{%lesson}}'
        );

        // drops index for column `courseID`
        $this->dropIndex(
            '{{%idx-lesson-courseID}}',
            '{{%lesson}}'
        );

        $this->dropTable('{{%lesson}}');
    }
}
