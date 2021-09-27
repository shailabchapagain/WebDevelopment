<?php

use yii\db\Migration;

/**
 * Class m200516_234751_insert_course_data
 */
class m200516_234751_insert_course_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%course}}', ['id','language','courseName','courseCategory','courseDescription','imageURL','addDate','author','price'],[
            [
                 1,
                'EN',
                'Nutrition and Health: Micronutrients and Malnutrition',
                 3,
                'There is an overload of information about nutrition and health, but what is the truth and what can you do to improve the health of your patients? Learn more about nutrition and how our diet profoundly impacts our current and future health. This course addresses the relationship between nutrition and human health, with a focus on health problems related to malnutrition.',
                '/resources/images/courses/1.jpg',
                time(),
                2,
                19.99
            ],
            [
                2,
                'EN',
                'Introduction to Biology - The Secret of Life',
                4,
                'Explore the secret of life through the basics of biochemistry, genetics, molecular biology, recombinant DNA, genomics and rational medicine.',
                '/resources/images/courses/2.jpg',
                time(),
                3,
                22.00

            ],
            [
                3,
                'EN',
                'Essential Human Biology: Cells and Tissues',
                4,
                ' Perhaps you\'re just keen to learn more about the wonders of the human body? Our bodies are amazing but complex biological machines. This course will provide you with an outstanding foundation of knowledge in human anatomy and physiology.',
                '/resources/images/courses/3.jpg',
                time() ,
                4,
                23.00
                ],
            [
                4,
                'EN',
                'C Programming: Getting Started',
                1,
                'The C programming language is one of the most stable and popular programming languages in the world. It helps to power your smartphone, your car\'s navigation system, robots, drones, trains, and almost all electronic devices. C is used in any circumstances where speed and flexibility are important, such as in embedded systems or high-performance computing.',
                '/resources/images/courses/4.jpg',
                time(),
                5,
                19.00

            ],
            [
                5,
                'EN',
                'Programming Basics',
                1,
                'Basic concepts of computer programming are introduced, starting with the notion of an algorithm. Emphasis is on developing the ability to write programs to solve practical computational problems.',
                '/resources/images/courses/5.jpg',
                time(),
                6,
                9.99

            ],
            [
                 6,
                'EN',
                'Introduction to Marketing',
                1,
                'Marketing is a crucial function in all businesses and organizations, and is becoming increasingly crucial to success in our modern global economy. This course, regardless of your industry background, will teach you core concepts and tools to help you better understand and excel in marketing. Key topics include Market Research and its importance to strategy, brand strategy, pricing, integrated marketing communication, social media strategy, and more.',
                '/resources/images/courses/6.jpg',
                time(),
                2,
                0.00

            ],
            [
                 7,
                'EN',
                'Data Science: Productivity Tools',
                5,
                'A typical data analysis project may involve several parts, each including several data files and different scripts with code. Keeping all this organized can be challenging. Keep your projects organized and produce reproducible reports using GitHub, git, Unix/Linux, and RStudio.',
                '/resources/images/courses/7.jpg',
                time(),
                8,
                12.00
            ],
            [
                8,
                'PT',
                'Ciência de dados: ferramentas de produtividade',
                5,
                'Um projeto típico de análise de dados pode envolver várias partes, cada uma incluindo vários arquivos de dados e diferentes scripts com código. Manter tudo isso organizado pode ser um desafio. Mantenha seus projetos organizados e produza relatórios reproduzíveis usando GitHub, git, Unix / Linux e RStudio.',
                '/resources/images/courses/9.jpg',
                time(),
                8,
                11.00
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
        echo "m200516_234751_insert_course_data cannot be reverted.\n";

        return false;
    }
    */
}
