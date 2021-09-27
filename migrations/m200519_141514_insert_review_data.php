<?php

use yii\db\Migration;

/**
 * Class m200519_141514_insert_review_data
 */
class m200519_141514_insert_review_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    $this->batchInsert("{{%review}}", ["reviewtext","rating","FK_userID","FK_courseID"], [

            [
                "I took this course and it was just awesome, the instructors were very precise in teaching they made it very easy to follow and they stay on course when explaining specifics. Am so glad I took the course!",
                5,
                1,
                2

            ],
            [
                "The course was great. Professor gives a lot of detailed information and breaks it down into small chunks with many excercises. Although this can make the course seem slow at times one can always skip something that is already known or speed up the playback rate. ",
                4,
                9,
                3

            ],
        [
            "In general the course is well organised in my opinion, the topics bring together all the necessary functions, and if one has willingness to learn deeper after the course all the other alternative functions will be quite easy to understand and apply.",
            4,
            10,
            3

        ],

        ]);

    }


/**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "to remove data please remove rows manually";
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200519_141514_insert_review_data cannot be reverted.\n";

        return false;
    }
    */
}
