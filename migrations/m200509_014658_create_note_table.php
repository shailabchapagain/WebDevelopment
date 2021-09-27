<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%note}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m200509_014658_create_note_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%note}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(45)->unique()->notNull(),
            'notetext' => $this->string(2048),
            'FK_userID' => $this->integer()->notNull(),
        ]);

        // creates index for column `FK_userID`
        $this->createIndex(
            '{{%idx-note-FK_userID}}',
            '{{%note}}',
            'FK_userID'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-note-FK_userID}}',
            '{{%note}}',
            'FK_userID',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-note-FK_userID}}',
            '{{%note}}'
        );

        // drops index for column `FK_userID`
        $this->dropIndex(
            '{{%idx-note-FK_userID}}',
            '{{%note}}'
        );

        $this->dropTable('{{%note}}');
    }
}
