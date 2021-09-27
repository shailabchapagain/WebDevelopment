<?php

use yii\db\Migration;

/**
 * Class m200512_170617_insert_language_data
 */
class m200512_170617_insert_language_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%language}}', ['ISO','language'], [
            [
                'IT',
                'Italian'

            ],
            [
                'NP',
                'Nepali'
            ],
            [
                'PT',
                'Portuguese'
            ],
            [
                'EN',
                'English'
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
        echo "m200512_170617_insert_language_data cannot be reverted.\n";

        return false;
    }
    */
}
