<?php

use yii\db\Migration;

/**
 * Class m200518_214349_insert_lesson_data
 */
class m200518_214349_insert_lesson_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
            $this->batchInsert("{{%lesson}}",["lessonTitle","lessonDescription","courseID","order"],
                [
                    [
                        'Principles',
                        'Start the course by learning about the general principles that apply to vitamins and minerals.',
                        1,
                        1
                    ],

                    [
                        'Vitamins and Health',
                        'Learn about the fat soluble vitamins: vitamin A, vitamin D and vitamin E.',
                        1,
                        2
                    ],

                    [
                        'MicroNutrient Malnutrition',
                        'Discuss the prevalence and trends of micronutrient deficiencies and their geographical distribution. We will also talk about the double burden of malnutrition.',
                        1,
                        3
                    ],

                    [
                        'Structure and function',
                        'Describes the building blocks of life and how their interactions dictate structure and function in biology.',
                        2,
                        4
                    ],
                    [
                        'Genotypes and Phenotypes',
                        'You will learn how to predict genotypes and phenotypes given genetics data.',
                        2,
                        5
                    ],
                    [
                        'Molecular biology',
                        'You will learn How to explain the central dogma of molecular biology and convert DNA sequence to RNA sequence to protein sequencea.',
                        2,
                        6
                    ],
                    [
                        'Principle',
                        'Describes the principles of early sequencing as well as modern sequencing and the effects of these technologies on the filed of genomics & How to apply the principles of modern biology to issues in today\'s society.',
                        2,
                        7
                    ],
                    [
                        'Function',
                        'Knowledge of structure and function of human cells and tissues.',
                        3,
                        8
                    ],
                    [
                        'Human Anatomy',
                        'Understanding of basic human anatomy and physiology.',
                        3,
                        9
                    ],
                    [
                        'Health Science',
                        'Preparation for study of health sciences and careers in health.',
                        3,
                        10
                    ],
                    [
                        'Presentation',
                        'Define, distinguish and give examples of hardware/software, computer programs/algorithms.',
                        4,
                        11
                    ],
                    [
                        'Variable and declaration',
                        'Here you will learn to explain the concept of a variable and declare, initialize and modify variables of data types int, double and char.',
                        4,
                        12
                    ],
                    [
                        'loops',
                        'Create simple C-programs that utilize for-loops to repeat blocks of instructions.',
                        4,
                        13
                    ],
                    [
                        'Functions',
                        'Here you will learn to declare, call the functions and about parameters.',
                        4,
                        14
                    ],
                    [
                        'Getting Started',
                        'Basic knowledge of the history of computer and installation of various stuff and explanation of the programming.',
                        5,
                        15
                    ],
                    [
                        'Commands to Objects',
                        'JavaScript is an object-oriented language. That means that the language has objects that you can give commands to.',
                        5,
                        16
                    ],
                    [
                        'programs',
                        'Related to How to handle large and complex programs and also good programming practices.',
                        5,
                        17
                    ],
                    [
                        'Segmentation System',
                        'Develop a basic customer segmentation system.',
                        6,
                        18
                    ],
                    [
                        'Consumer Psychology',
                        'Begin to understand the psychology of consumer decision making.',
                        6,
                        19
                    ],
                    [
                        'Marketing Metrics',
                        'Understand how marketing metrics can benefit your business.',
                        6,
                        20
                    ],
                    [
                        'Unix/Linux',
                        'How to use Unix/Linux to manage your file system.',
                        7,
                        21
                    ],
                    [
                        'Git',
                        'You\'ll learn how to perform version control with git.',
                        7,
                        22
                    ],
                    [
                        'GitHub',
                        'How to start a repository on GitHub.',
                        7,
                        23
                    ],
                    [
                        'RStudio',
                        'How to leverage the many useful features provided by RStudio',
                        7,
                        24
                    ],
                    [
                        'Unix/Linux',
                        'Como usar o Unix / Linux para gerenciar seu sistema de arquivos.',
                        8,
                        25
                    ],
                    [
                        'Git',
                        'Você aprenderá como executar o controle de versão com o git.',
                        8,
                        26
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
        echo "m200518_214349_insert_lesson_data cannot be reverted.\n";

        return false;
    }
    */
}
