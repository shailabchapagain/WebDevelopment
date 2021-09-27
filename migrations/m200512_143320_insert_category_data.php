<?php

use yii\db\Migration;

/**
 * Class m200512_143320_insert_category_dummy_data
 */
class m200512_143320_insert_category_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%category}}', ['id', 'name','imgURL','description'], [
            [
                '1',
                'Programming',
                '/resources/images/category/1.jpg',
                'Design and build computer programs to accomplish a any computing result you desire.'
            ],
            [
                '2',
                'Finance',
                '/resources/images/category/2.jpg',
                'learn how an individual, company or government acquires the money needed.'
            ],
            [
                '3',
                'Health',
                '/resources/images/category/3.jpg',
                'Increase your personal knowledge about attitudes and behaviours connected to health.'
            ],
            [
                '4',
                'Biology',
                '/resources/images/category/4.jpg',
                'Learn more about the fundamentals and internal working of nature around you.'
            ],
            [
                '5',
                'Data Science',
                '/resources/images/category/5.jpg',
                'Use scientific methods, processes, algorithms and systems to understand data.'
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


}
