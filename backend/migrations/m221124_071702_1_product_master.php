<?php

use yii\db\Schema;
use yii\db\Migration;

class m221124_071702_1_product_master extends Migration
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
            '{{%1_product_master}}',
            [
                'product_id'=> $this->primaryKey(11),
                'product_type_id'=> $this->integer(11)->notNull(),
                'product_name'=> $this->string(250)->notNull(),
                'product_description'=> $this->string(250)->notNull(),
                'created_by'=> $this->string(250)->null()->defaultValue(null),
                'created_date'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'modified_by'=> $this->string(250)->null()->defaultValue(null),
                'modified_date'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'product_feature'=> $this->string(300)->null()->defaultValue(null),
                'image_path'=> $this->string(250)->null()->defaultValue(null),
                'kyc_required'=> $this->integer(11)->null()->defaultValue(0),
                'isagentlogin_required'=> $this->integer(11)->null()->defaultValue(0),
                'product_details_image'=> $this->string(255)->null()->defaultValue(null),
                'product_header_logo'=> $this->string(255)->null()->defaultValue(null),
                'product_service'=> $this->string(255)->null()->defaultValue(null),
                'isencryption_required'=> $this->boolean(1)->null()->defaultValue(0),
                'ekyc_service'=> $this->integer(11)->null()->defaultValue(null),
            ],$tableOptions
        );
        $this->createIndex('product_name','{{%1_product_master}}',['product_name'],false);
        $this->createIndex('product_type_id','{{%1_product_master}}',['product_type_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('product_name', '{{%1_product_master}}');
        $this->dropIndex('product_type_id', '{{%1_product_master}}');
        $this->dropTable('{{%1_product_master}}');
    }
}
