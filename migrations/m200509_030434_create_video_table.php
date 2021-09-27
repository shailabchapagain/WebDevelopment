<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%video}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%lesson}}`
 */
class m200509_030434_create_video_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%video}}', [
            'id' => $this->primaryKey(),
            'videoTitle' => $this->string(45)->notNull(),
            'videoDescription' => $this->string(512)->notNull(),
            'videoURL' => $this->string(512)->notNull(),
            'lessonID' => $this->integer()->notNull(),
        ]);

        // creates index for column `lessonID`
        $this->createIndex(
            '{{%idx-video-lessonID}}',
            '{{%video}}',
            'lessonID'
        );

        // add foreign key for table `{{%lesson}}`
        $this->addForeignKey(
            '{{%fk-video-lessonID}}',
            '{{%video}}',
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
            '{{%fk-video-lessonID}}',
            '{{%video}}'
        );

        // drops index for column `lessonID`
        $this->dropIndex(
            '{{%idx-video-lessonID}}',
            '{{%video}}'
        );

        $this->dropTable('{{%video}}');
    }
}
