<?php

use yii\db\Schema;
use yii\db\Migration;

class m221124_071627_1_product_api_configuration extends Migration
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
            '{{%1_product_api_configuration}}',
            [
                'api_configuration_id'=> $this->integer(11)->notNull(),
                'product_configuration_id'=> $this->primaryKey(11),
                'refering_product_service_id'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('api_configuration_id','{{%1_product_api_configuration}}',['api_configuration_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('api_configuration_id', '{{%1_product_api_configuration}}');
        $this->dropTable('{{%1_product_api_configuration}}');
    }
}
