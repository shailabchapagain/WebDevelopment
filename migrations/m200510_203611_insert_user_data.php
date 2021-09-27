<?php

use yii\db\Migration;

/**
 * Class m200522_203611_insert_user_data
 */
class m200510_203611_insert_user_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // insert admin user: neo/neo
        $security = Yii::$app->security;
        $columns = ['role_id', 'email', 'username', 'password', 'status', 'created_at', 'access_token', 'auth_key'];
        $this->batchInsert('{{%user}}', $columns, [
            [
                1, // Role::ROLE_ADMIN
                'admin@tdot.com',
                'admin',
                Yii::$app->security->generatePasswordHash('@dm!n123'),
                1, // User::STATUS_ACTIVE
                gmdate('Y-m-d H:i:s'),
                $security->generateRandomString(),
                $security->generateRandomString(),
            ],

            [
                4, // Role::ROLE_TEACHER
                'wageningen@tdot.com',
                'wageningen',
                Yii::$app->security->generatePasswordHash('@dm!n123'),
                1, // User::STATUS_ACTIVE
                gmdate('Y-m-d H:i:s'),
                $security->generateRandomString(),
                $security->generateRandomString(),
            ],

            [
                4, // Role::ROLE_TEACHER
                'massachusetts@tdot.com',
                'massachusetts',
                Yii::$app->security->generatePasswordHash('massa123.'),
                1, // User::STATUS_ACTIVE
                gmdate('Y-m-d H:i:s'),
                $security->generateRandomString(),
                $security->generateRandomString(),
            ],
            [
                4, // Role::ROLE_TEACHER
                'adelaide@tdot.com',
                'adelaide',
                Yii::$app->security->generatePasswordHash('Adeliade123.'),
                1, // User::STATUS_ACTIVE
                gmdate('Y-m-d H:i:s'),
                $security->generateRandomString(),
                $security->generateRandomString(),
            ],

            [
                4, // Role::ROLE_TEACHER
                'darmouth@tdot.com',
                'darmouth',
                Yii::$app->security->generatePasswordHash('@dm!n123'),
                1, // User::STATUS_ACTIVE
                gmdate('Y-m-d H:i:s'),
                $security->generateRandomString(),
                $security->generateRandomString(),
            ],

            [
                4, // Role::ROLE_TEACHER
                'itbombay@tdot.com',
                'itsbombay',
                Yii::$app->security->generatePasswordHash('bombayINDIA123'),
                1, // User::STATUS_ACTIVE
                gmdate('Y-m-d H:i:s'),
                $security->generateRandomString(),
                $security->generateRandomString(),
            ],

            [
                3, // Role::ROLE_MANAGER
                'bcolumbia@tdot.com',
                'bcolumbia',
                Yii::$app->security->generatePasswordHash('coloumbian123.'),
                1, // User::STATUS_ACTIVE
                gmdate('Y-m-d H:i:s'),
                $security->generateRandomString(),
                $security->generateRandomString(),
            ],
            [
                3, // Role::ROLE_MANAGER
                'shailabgun@tdot.com',
                'shailabgun',
                Yii::$app->security->generatePasswordHash('portugal.'),
                1, // User::STATUS_ACTIVE
                gmdate('Y-m-d H:i:s'),
                $security->generateRandomString(),
                $security->generateRandomString(),
            ],


            [
                4, // Role::ROLE_TEACHER
                'hardvard@tdot.com',
                'hardvard',
                Yii::$app->security->generatePasswordHash('hardv@rd123.'),
                1, // User::STATUS_ACTIVE
                gmdate('Y-m-d H:i:s'),
                $security->generateRandomString(),
                $security->generateRandomString(),
            ],

            [
                2, // Role::ROLE_USER
                'student1@yahoo.com',
                'pedro',
                Yii::$app->security->generatePasswordHash('Student@111.'),
                1, // User::STATUS_ACTIVE
                gmdate('Y-m-d H:i:s'),
                $security->generateRandomString(),
                $security->generateRandomString(),
            ],

            [
                2, // Role::ROLE_USER
                'student2@yahoo.com',
                'liam',
                Yii::$app->security->generatePasswordHash('Student@222.'),
                1, // User::STATUS_ACTIVE
                gmdate('Y-m-d H:i:s'),
                $security->generateRandomString(),
                $security->generateRandomString(),
            ],

            [
                2, // Role::ROLE_USER
                'student3@yahoo.com',
                'thomas',
                Yii::$app->security->generatePasswordHash('Student@333.'),
                1, // User::STATUS_ACTIVE
                gmdate('Y-m-d H:i:s'),
                $security->generateRandomString(),
                $security->generateRandomString(),
            ],


        ]);

        // insert profile data
        $columns = ['user_id', 'full_name', 'created_at'];
        $this->batchInsert('{{%profile}}', $columns, [
            [1, 'the one', gmdate('Y-m-d H:i:s')],
            [2, 'Wageningen', gmdate('Y-m-d H:i:s')],
            [3, 'Massachusetts ', gmdate('Y-m-d H:i:s')],
            [4, 'Adelaide', gmdate('Y-m-d H:i:s')],
            [5, 'Dartmouth', gmdate('Y-m-d H:i:s')],
            [6, 'Bombay', gmdate('Y-m-d H:i:s')],
            [7, 'British Columbia', gmdate('Y-m-d H:i:s')],
            [8, 'Shailab', gmdate('Y-m-d H:i:s')],
            [9, 'Harvard', gmdate('Y-m-d H:i:s')],
            [10, '1st Student', gmdate('Y-m-d H:i:s')],
            [11, '2nd Student', gmdate('Y-m-d H:i:s')],
            [12, '3rd Student', gmdate('Y-m-d H:i:s')],

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
        echo "m200522_203611_insert_user_data cannot be reverted.\n";

        return false;
    }
    */
}
