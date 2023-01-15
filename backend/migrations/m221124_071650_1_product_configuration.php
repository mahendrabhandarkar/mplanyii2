<?php

use yii\db\Schema;
use yii\db\Migration;

class m221124_071650_1_product_configuration extends Migration
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
            '{{%1_product_configuration}}',
            [
                'product_configuration_id'=> $this->primaryKey(11),
                'product_id'=> $this->integer(11)->notNull(),
                'product_service_id'=> $this->integer(11)->notNull(),
                'product_configurable_columns'=> $this->text()->notNull(),
                'api_call'=> $this->char(1)->null()->defaultValue('Y'),
                'redirect'=> $this->char(1)->null()->defaultValue('N'),
                'batch'=> $this->char(1)->null()->defaultValue('N'),
                'display_to_customer'=> $this->char(1)->null()->defaultValue('N'),
                'step'=> $this->integer(11)->notNull(),
                'store_in_db'=> $this->tinyInteger(1)->null()->defaultValue(null),
                'created_date'=> $this->string(256)->null()->defaultValue('current_timestamp()'),
                'modified_date'=> $this->string(256)->null()->defaultValue('current_timestamp()'),
                'created_by'=> $this->string(250)->null()->defaultValue(null),
                'modified_by'=> $this->string(250)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('product_id','{{%1_product_configuration}}',['product_id'],false);
        $this->createIndex('product_service_id','{{%1_product_configuration}}',['product_service_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('product_id', '{{%1_product_configuration}}');
        $this->dropIndex('product_service_id', '{{%1_product_configuration}}');
        $this->dropTable('{{%1_product_configuration}}');
    }
}
