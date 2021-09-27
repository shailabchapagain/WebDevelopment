<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%language}}`
 * - `{{%category}}`
 */
class m200509_013247_create_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course}}', [
            'id' => $this->primaryKey(),
            'language' => $this->string(2)->notNull(),
            'courseName' => $this->string(255)->notNull(),
            'courseCategory' => $this->integer()->notNull(),
            'courseDescription' => $this->string(2048)->notNull(),
            'imageURL' => $this->string(512)->notNull(),
            'addDate' => $this->integer()->notNull(),
            'author' => $this->integer()->notNull(),
            'price' => $this->float(2)->notNull(),
        ]);

        // creates index for column `language`
        $this->createIndex(
            '{{%idx-course-language}}',
            '{{%course}}',
            'language'
        );

        // add foreign key for table `{{%language}}`
        $this->addForeignKey(
            '{{%fk-course-language}}',
            '{{%course}}',
            'language',
            '{{%language}}',
            'ISO',
            'CASCADE'
        );

        // creates index for column `courseCategory`
        $this->createIndex(
            '{{%idx-course-courseCategory}}',
            '{{%course}}',
            'courseCategory'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-course-courseCategory}}',
            '{{%course}}',
            'courseCategory',
            '{{%category}}',
            'id',
            'CASCADE'
        );

        // creates index for column `author`
        $this->createIndex(
            '{{%idx-course-author}}',
            '{{%course}}',
            'author'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-course-author}}',
            '{{%course}}',
            'author',
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
        // drops foreign key for table `{{%language}}`
        $this->dropForeignKey(
            '{{%fk-course-language}}',
            '{{%course}}'
        );

        // drops index for column `language`
        $this->dropIndex(
            '{{%idx-course-language}}',
            '{{%course}}'
        );

        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-course-courseCategory}}',
            '{{%course}}'
        );

        // drops index for column `courseCategory`
        $this->dropIndex(
            '{{%idx-course-courseCategory}}',
            '{{%course}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-course-author}}',
            '{{%course}}'
        );

        // drops index for column `author`
        $this->dropIndex(
            '{{%idx-course-author}}',
            '{{%course}}'
        );

        $this->dropTable('{{%course}}');
    }
}
