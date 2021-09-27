<?php

use yii\db\Migration;

/**
 * Class m200612_193854_insert_university_data
 */
class m200612_193854_insert_university_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert("{{%university}}", ["id","universityname","universitycountry"], [

            [
                1,
                'Tribhuvan University',
                'Nepal'

            ],
            [
                2,
                'Politecnico di Milano',
                'Italy'

            ],
            [
                3,
                'University of Lisbon',
                'Portugal'

            ],
            [
                4,
                'University of North Texas',
                'America'

            ],
            [
                5,
                'University of Oxford',
                'Uk'

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
        echo "m200612_193854_insert_university_data cannot be reverted.\n";

        return false;
    }
    */
}
