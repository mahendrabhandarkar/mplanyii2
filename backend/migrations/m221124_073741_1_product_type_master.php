<?php

use yii\db\Schema;
use yii\db\Migration;

class m221124_073741_1_product_type_master extends Migration
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
            '{{%1_product_type_master}}',
            [
                'product_type_id'=> $this->primaryKey(11),
                'product_type'=> $this->string(250)->notNull(),
                'product_type_description'=> $this->string(250)->null()->defaultValue(null),
                'created_date'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'modified_date'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'created_by'=> $this->string(250)->null()->defaultValue(null),
                'modified_by'=> $this->string(250)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('product_type_unique','{{%1_product_type_master}}',['product_type'],true);
        $this->createIndex('product_type','{{%1_product_type_master}}',['product_type'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('product_type_unique', '{{%1_product_type_master}}');
        $this->dropIndex('product_type', '{{%1_product_type_master}}');
        $this->dropTable('{{%1_product_type_master}}');
    }
}
