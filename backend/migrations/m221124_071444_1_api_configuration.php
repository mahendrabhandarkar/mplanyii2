<?php

use yii\db\Schema;
use yii\db\Migration;

class m221124_071444_1_api_configuration extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%1_api_configuration}}',
            [
                'api_configuration_id'=> $this->primaryKey(11),
                'api_name'=> $this->string(250)->notNull(),
                'authentication_type'=> $this->string(250)->notNull(),
                'username'=> $this->string(250)->null()->defaultValue(null),
                'password'=> $this->string(250)->null()->defaultValue(null),
                'access_token'=> $this->string(250)->null()->defaultValue(null),
                'token_endpoint'=> $this->string(250)->null()->defaultValue(null),
                'endpoint_name'=> $this->string(250)->null()->defaultValue(null),
                'use_as'=> $this->string(250)->null()->defaultValue(null),
                'error_handling'=> $this->text()->null()->defaultValue(null),
                'data_type'=> $this->string(250)->null()->defaultValue(null),
                'api_method'=> $this->string(10)->notNull(),
                'api_endpoint_url'=> $this->text()->notNull(),
                'headers'=> $this->text()->notNull(),
                'parameters'=> $this->text()->notNull(),
                'accept'=> $this->string(250)->null()->defaultValue(null),
                'content_type'=> $this->string(250)->null()->defaultValue(null),
                'created_date'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'modified_date'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'created_by'=> $this->string(250)->null()->defaultValue(null),
                'modified_by'=> $this->string(250)->null()->defaultValue(null),
                'request_response_configurable'=> $this->text()->null()->defaultValue(null),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%1_api_configuration}}');
    }
}
