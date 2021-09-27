<?php

use yii\db\Schema;
use yii\db\Migration;

class m150214_044831_init_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        // create tables. note the specific order
        $this->createTable('{{%role}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' not null',
            'created_at' => Schema::TYPE_TIMESTAMP . ' null',
            'updated_at' => Schema::TYPE_TIMESTAMP . ' null',
            'can_admin' => Schema::TYPE_SMALLINT . ' not null default 0',
            'can_manager' => Schema::TYPE_SMALLINT . ' not null default 0',
            'can_teacher' => Schema::TYPE_SMALLINT . ' not null default 0',


        ], $tableOptions);
        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'role_id' => Schema::TYPE_INTEGER . ' not null',
            'status' => Schema::TYPE_SMALLINT . ' not null',
            'email' => Schema::TYPE_STRING . ' null',
            'username' => Schema::TYPE_STRING . ' null',
            'password' => Schema::TYPE_STRING . ' null',
            'auth_key' => Schema::TYPE_STRING . ' null',
            'access_token' => Schema::TYPE_STRING . ' null',
            'logged_in_ip' => Schema::TYPE_STRING . ' null',
            'logged_in_at' => Schema::TYPE_TIMESTAMP . ' null',
            'created_ip' => Schema::TYPE_STRING . ' null',
            'created_at' => Schema::TYPE_TIMESTAMP . ' null',
            'updated_at' => Schema::TYPE_TIMESTAMP . ' null',
            'banned_at' => Schema::TYPE_TIMESTAMP . ' null',
            'banned_reason' => Schema::TYPE_STRING . ' null',
        ], $tableOptions);
        $this->createTable('{{%user_token}}', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' null',
            'type' => Schema::TYPE_SMALLINT . ' not null',
            'token' => Schema::TYPE_STRING . ' not null',
            'data' => Schema::TYPE_STRING . ' null',
            'created_at' => Schema::TYPE_TIMESTAMP . ' null',
            'expired_at' => Schema::TYPE_TIMESTAMP . ' null',
        ], $tableOptions);
        $this->createTable('{{%profile}}', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' not null',
            'created_at' => Schema::TYPE_TIMESTAMP . ' null',
            'updated_at' => Schema::TYPE_TIMESTAMP . ' null',
            'full_name' => Schema::TYPE_STRING . ' null',
            'timezone' => Schema::TYPE_STRING . ' null',
        ], $tableOptions);
        $this->createTable('{{%user_auth}}', [
            'id' => Schema::TYPE_PK,
            'user_id' => Schema::TYPE_INTEGER . ' not null',
            'provider' => Schema::TYPE_STRING . ' not null',
            'provider_id' => Schema::TYPE_STRING . ' not null',
            'provider_attributes' => Schema::TYPE_TEXT . ' not null',
            'created_at' => Schema::TYPE_TIMESTAMP . ' null',
            'updated_at' => Schema::TYPE_TIMESTAMP . ' null'
        ], $tableOptions);

        // add indexes for performance optimization
        $this->createIndex('{{%user_email}}', '{{%user}}', 'email', true);
        $this->createIndex('{{%user_username}}', '{{%user}}', 'username', true);
        $this->createIndex('{{%user_token_token}}', '{{%user_token}}', 'token', true);
        $this->createIndex('{{%user_auth_provider_id}}', '{{%user_auth}}', 'provider_id', false);

        // add foreign keys for data integrity
        $this->addForeignKey('{{%user_role_id}}', '{{%user}}', 'role_id', '{{%role}}', 'id');
        $this->addForeignKey('{{%profile_user_id}}', '{{%profile}}', 'user_id', '{{%user}}', 'id');
        $this->addForeignKey('{{%user_token_user_id}}', '{{%user_token}}', 'user_id', '{{%user}}', 'id');
        $this->addForeignKey('{{%user_auth_user_id}}', '{{%user_auth}}', 'user_id', '{{%user}}', 'id');

        // insert role data
        $columns = ['id','name', 'can_admin', 'can_manager', 'can_teacher', 'created_at'];
        $this->batchInsert('{{%role}}', $columns, [
            ['1','Admin', 1,1,1, gmdate('Y-m-d H:i:s')],
            ['2','User', 0,0,0, gmdate('Y-m-d H:i:s')],
            ['3','Manager', 0,1,1, gmdate('Y-m-d H:i:s')],
            ['4','Teacher', 0,0,1, gmdate('Y-m-d H:i:s')],
        ]);


    }

    public function down()
    {
        // drop tables in reverse order (for foreign key constraints)
        $this->dropTable('{{%user_auth}}');
        $this->dropTable('{{%profile}}');
        $this->dropTable('{{%user_token}}');
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%role}}');
    }
}
