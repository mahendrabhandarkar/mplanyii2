<?php

use yii\db\Schema;
use yii\db\Migration;

class m221124_073724_1_product_type_configuration extends Migration
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
            '{{%1_product_type_configuration}}',
            [
                'product_type_configuration_id'=> $this->primaryKey(11),
                'product_type_id'=> $this->integer(11)->notNull(),
                'product_type_configurable_columns'=> $this->text()->notNull(),
                'created_date'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'modified_date'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'created_by'=> $this->string(250)->null()->defaultValue(null),
                'modified_by'=> $this->string(250)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('product_type_id','{{%1_product_type_configuration}}',['product_type_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('product_type_id', '{{%1_product_type_configuration}}');
        $this->dropTable('{{%1_product_type_configuration}}');
    }
}
