<?php

use yii\db\Migration;

/**
 * Class m200604_152742_insert_unit_data
 */
class m200604_152742_insert_unit_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        {
            $this->batchInsert('{{%unit}}', ['id','unitTitle','unitText','imageURL','lessonID'],[
                [
                    1,
                    'Macronutrients',
                   ' Macronutrients are needed in larger quantities (in gram range). They normally include water, carbohydrates, fat and
        protein. Macronutrients (except water) are also called energy-providing nutrients. Energy is measured in calories and
        is essential for the body to grow, repair and develop new tissues, conduct nerve impulses and regulate life process.',
                    '/resources/images/units/1.jpg',
                    3
                ],
                [
                    2,
                    'Fundamental Principles',
                    ' Essential nutrients may be appropriately added to foods for the purpose of contributing to preventing/reducing the risk of, or correcting, a demonstrated deficiency of one or more essential
nutrients in the population. Different types of addition of essential nutrients for the purposes described in these Principles may be described by the
term ‘fortification’ in certain Member Countries.See the Guidelines for Vitamin and Mineral Food Supplements (CAC/GL-55-2005).
‘Nutrient’ definition: See section 2.5 of the Guidelines on Nutrition Labelling (CAC/GL 2-1985).
Internationally, there are different regulatory approaches to how voluntary addition of essential nutrients is legally
framed and/or managed by competent national and/or regional authorities. In all these approaches, some form of
regulatory oversight is required. There are approaches whereby addition of essential nutrients is generally permitted
within a regulatory framework that can restrict foods or categories of foods to which nutrients may be added and set
specific limits for those nutrients. ',
                    '/resources/images/units/2.png',
                    1
                ],
                [
                    3,
                    'Selection of Nutrients and Determination of Amounts',
                    'The first step in the process of setting dietary guidelines is defining the significant diet-related public health problems in a community. Once these are defined, the adequacy of the diet is evaluated by comparing the information available on dietary intake with recommended nutrient intakes (RNIs). Nutrient intake goals under this situation are specific for a given ecologic setting, and their purpose is to promote overall health, control specific nutritional diseases (whether they are induced by an excess or deficiency of nutrient intake), and reduce the risk of diet-related multi-factorial diseases. ',
                    '/resources/images/units/3.jpg',
                    1
                ],
                [
                    4,
                    'Selection of Foods',
                    'Food selection, or food choice, is the study of those factors that influence choice. Several fields of research have examined this relationship, including physiology, psychology, economics, and consumer behavior, to name a few.',
                    '/resources/images/units/4.jpg',
                    1
                ],
                [
                    5,
                    'Multivitamin/Multimineral Supplements',
                    'Multivitamins/multiminerals (MVMs) are the most frequently used dietary supplements, with close to half of American adults taking them. MVMs cannot take the place of eating a variety of foods that are important to a healthy diet. Foods provide more than vitamins and minerals.',
                    '/resources/images/units/5.jpg',
                    2
                ],
                [
                    6,
                    'Essential nutrients ',
                    'Every day, your body produces skin, muscle, and bone. It churns out rich red blood that carries nutrients and oxygen to remote outposts, and it sends nerve signals skipping along thousands of miles of brain and body pathways.',
                    '/resources/images/units/6.jpg',
                    2
                ],
                [
                    7,
                    'Difference between vitamins and minerals',
                    'Although they are all considered micronutrients, vitamins and minerals differ in basic ways. Vitamins are organic and can be broken down by heat, air, or acid. Minerals are inorganic and hold on to their chemical structure.',
                    '/resources/images/units/7.jpg',
                    2
                ],
                [
                    8,
                    'Prevention and Control',
                    'The best way to prevent malnutrition is to eat a healthy, balanced diet. You need to eat a variety of foods from the main food groups, including: plenty of fruit and vegetables. plenty of starchy foods such as bread, rice, potatoes, pasta.',
                    '/resources/images/units/8.jpg',
                    3
                ],
                [
                    9,
                    'Micronutrient Deficiency',
                    'In contrast to macronutrients (energy, protein and fat), micronutrients are vitamins and minerals which are consumed in small quantities, but are nonetheless essential for physical and mental development.',
                    '/resources/images/units/9.png',
                    3
                ],
                [
                    10,
                    'Fundamentos do Unix',
                    'Em termos de computadores, o Unix tem uma longa história. O Unix foi desenvolvido nos Laboratórios Bell da AT&T depois que a Bell Labs se retirou de uma colaboração de longo prazo com a General Electric (G.E.) e o MIT para
                     criar um sistema operacional chamado MULTICS (Sistema multiplexado de operação e computação) para
                     Mainframe da G.E. Em 1969, os pesquisadores do Bell Labs criaram a primeira versão do Unix (então chamada
                     UNICS, ou Sistema Operacional e de Computação Uniplexed), que evoluiu para o comum
                     Sistemas Unix de hoje.',
                    '/resources/images/units/10.jpg',
                    25
                ],
                [
                    11,
                    'Compreendendo usuários e grupos',
                    'Uma conta de usuário fornece acesso ao sistema Unix, seja por um shell, uma conta ftp ou
                     Outros significados. Para usar os recursos que o sistema Unix fornece, você precisa de uma conta de usuário válida
                     e permissões de recursos (as permissões são discutidas no Capítulo 4). Pense na sua conta como sua
                     passaporte, identificando quem você é para o sistema Unix.',
                    '/resources/images/units/11.gif',
                    25
                ],
                [
                    12,
                    'Uma breve história do git',
                    'O kernel Linux é um projeto de software de código aberto de escopo bastante amplo. Durante a maior parte da vida útil da manutenção do kernel Linux (1991–2002), as alterações no software foram repassadas como patches e arquivos arquivados. Em 2002, o projeto do kernel Linux começou a usar um DVCS proprietário chamado BitKeeper.',
                    '/resources/images/units/12.jpg',
                    26
                ],



            ]);
        }

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
        echo "m200604_152742_insert_unit_data cannot be reverted.\n";

        return false;
    }
    */
}
