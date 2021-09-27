<?php

use yii\db\Migration;

/**
 * Class m200517_003838_insert_user_course_data
 */
class m200517_003838_insert_user_course_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%user_course}}', ['user_id','course_id', 'subscribed_at'], [
            [
                9,
                1,
                time()
            ],
            [
                9,
                2,
                time()
            ],

            [
                9,
                3,
                time()
            ],
            [
                9,
                4,
                time()
            ],

            [
                10,
                1,
                time()
            ],

            [
                11,
                5,
                time()
            ],
            [
                11,
                6,
                time()
            ],

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "to remove data please remove rows manually";
        return true;    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200517_003838_insert_user_course_data cannot be reverted.\n";

        return false;
    }
    */
}
