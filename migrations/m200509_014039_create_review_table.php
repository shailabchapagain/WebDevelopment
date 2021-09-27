<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%review}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%course}}`
 */
class m200509_014039_create_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%review}}', [
            'id' => $this->primaryKey(),
            'reviewtext' => $this->string(1024)->notNull(),
            'rating' => $this->integer()->notNull(),
            'FK_userID' => $this->integer()->notNull(),
            'FK_courseID' => $this->integer()->notNull(),
        ]);

        // creates index for column `FK_userID`
        $this->createIndex(
            '{{%idx-review-FK_userID}}',
            '{{%review}}',
            'FK_userID'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-review-FK_userID}}',
            '{{%review}}',
            'FK_userID',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `FK_courseID`
        $this->createIndex(
            '{{%idx-review-FK_courseID}}',
            '{{%review}}',
            'FK_courseID'
        );

        // add foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-review-FK_courseID}}',
            '{{%review}}',
            'FK_courseID',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-review-FK_userID}}',
            '{{%review}}'
        );

        // drops index for column `FK_userID`
        $this->dropIndex(
            '{{%idx-review-FK_userID}}',
            '{{%review}}'
        );

        // drops foreign key for table `{{%course}}`
        $this->dropForeignKey(
            '{{%fk-review-FK_courseID}}',
            '{{%review}}'
        );

        // drops index for column `FK_courseID`
        $this->dropIndex(
            '{{%idx-review-FK_courseID}}',
            '{{%review}}'
        );

        $this->dropTable('{{%review}}');
    }
}
