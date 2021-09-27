<?php

use yii\db\Migration;

/**
 * Class m200612_195150_insert_note_data
 */
class m200612_195150_insert_note_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert("{{%note}}", ["id","title","notetext","FK_userID"], [

            [
                1,
                'Multimedia Course',
                'Multimedia is the field related to computer controlled integration of texts, (still or moving images) graphics, drawings, audio and animations. The information/content in the multimedia can be represented through digitally (audio, video and animation) in contrast to traditional media.',
                1


            ],
            [
                2,
                'Artificial Intelligence',
                'Artificial intelligence (AI) refers to the simulation of human intelligence in machines that are programmed to think like humans and mimic their actions. The term may also be applied to any machine that exhibits traits associated with a human mind such as learning and problem-solving.',
                2


            ],
            [
                3,
                'Technology',
                'Technology ("science of craft", from Greek τέχνη, techne, "art, skill, cunning of hand"; and -λογία, -logia[2]) is the sum of techniques, skills, methods, and processes used in the production of goods or services or in the accomplishment of objectives, such as scientific investigation.',
                3


            ],
            [
                4,
                'Multi-level marketing',
                'Multi-level marketing (MLM), also called pyramid selling,[1][2] network marketing,[2][3] and referral marketing,[4] is a marketing strategy for the sale of products or services where the revenue of the MLM company is derived from a non-salaried workforce selling the company\'s products/services, while the earnings of the participants are derived from a pyramid-shaped or binary compensation commission system.',
                4


            ],
            [
                5,
                'Business Intelligence',
                'Business intelligence (BI) is a technology-driven process for analyzing data and presenting actionable information which helps executives, managers and other corporate end users make informed business decisions.',
                5


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
        echo "m200612_195150_insert_note_data cannot be reverted.\n";

        return false;
    }
    */
}
