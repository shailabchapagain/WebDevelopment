<?php

use yii\db\Migration;

/**
 * Class m200611_123620_insert_video_data
 */
class m200611_123620_insert_video_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert("{{%video}}", ["id","videoTitle","videoDescription","videoURL","lessonID"], [

            [
                1,
                'Principle of Nutrition',
               'Protein is an essential part of the human diet. It’s found in a large variety of foods, including eggs, dairy, seafood, legumes, meats, nuts and seeds.',
               'https://www.youtube.com/watch?v=v_nWQZEpzEM',
                1

            ],
            [
                2,
                'Healthy Eating',
               'The Centre for Child Nutrition, Health and Development (CCNHD) brings world-class talent and resources together to tackle the most important nutrition-related health issues facing children and their families in Canada and around the world.',
               'https://www.youtube.com/watch?v=fqhYBTg73fw',
                1

            ],
            [
            3,
                'Only vitamins We Need',
               'We all have friends who swear by their vitamin routine — their Vitamin C pills prevent them from getting colds, or their Vitamin D supplement really does boost their mood in the winter.',
               'https://www.youtube.com/watch?v=NPquTtjldGU',
                2

            ],
            [
            4,
                'Vitamins',
               'Should we be taking vitamin and mineral supplements? There is, unfortunately, no simple answer. Registered dietitian Daphna Steinberg says that for most adults under 50, a balanced diet is the best place to start, rather than the vitamin aisle.',
               'https://www.youtube.com/watch?v=NIeFXPGS7-A',
                2

            ],
            [
            5,
                'MicroNutrients and Malnutrition ',
               'Food plays a central role in our society but few people actually understand what it does to our bodies. Learn more about nutrition and how our diet  profoundly impacts our current and future health.',
               'https://www.youtube.com/watch?v=uH1aQUggHnM',
                3

            ],
            [
            6,
                'Signs and Symptoms of Nutrient Deficiencies',
               'Many nutrients are essential for good health.While it’s possible to get most of them from a balanced diet, the typical Western diet is low in several very important nutrients.',
               'https://www.youtube.com/watch?v=wuvpjhIe09A',
                3

            ],
            [
                7,
                'Como instalar o terminal linux no windows 8?',
               'Este vídeo explica como baixar e instalar um terminal muito bom para executar o Linux no Windows 8',
               'https://www.youtube.com/watch?v=X0h0n7Abe74',
                25

            ],
            [
                8,
                'Como usar Git e Github na prática?',
               'Você já se perguntou o que é Git? E o que é GitHub? Quais as diferenças? Por que devo usar Git nos meus projetos?
                Se você está aprendendo agora sobre o Git, está com dúvidas sobre como começar a usar, vem comigo que vou te mostrar como você pode ganhar poderes de controlar a linha do tempo do seu projeto, poder voltar ao passado e até criar universos paralelos com essa ferramenta poderosa que é o Git!',
               'https://www.youtube.com/watch?v=2alg7MQ6_sI',
                26

            ]
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
        echo "m200611_123620_insert_video_data cannot be reverted.\n";

        return false;
    }
    */
}
