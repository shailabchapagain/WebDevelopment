<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_course}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%course}}`
 */
class m200509_025152_create_junction_table_for_user_and_course_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_course}}', [
            'user_id' => $this->integer(),
            'course_id' => $this->integer(),
            'PRIMARY KEY(user_id, course_id)',
            'subscribed_at'=>$this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_course-user_id}}',
            '{{%user_course}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_course-user_id}}',
            '{{%user_course}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `course_id`
        $this->createIndex(
            '{{%idx-user_course-course_id}}',
            '{{%user_course}}',
            'course_id'
        );

        // add foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-user_course-course_id}}',
            '{{%user_course}}',
            'course_id',
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
            '{{%fk-user_course-user_id}}',
            '{{%user_course}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_course-user_id}}',
            '{{%user_course}}'
        );

        // drops foreign key for table `{{%course}}`
        $this->dropForeignKey(
            '{{%fk-user_course-course_id}}',
            '{{%user_course}}'
        );

        // drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-user_course-course_id}}',
            '{{%user_course}}'
        );

        $this->dropTable('{{%user_course}}');
    }
}
