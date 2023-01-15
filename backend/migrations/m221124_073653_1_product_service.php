<?php

use yii\db\Schema;
use yii\db\Migration;

class m221124_073653_1_product_service extends Migration
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
            '{{%1_product_service}}',
            [
                'product_service_id'=> $this->primaryKey(11),
                'no_of_steps'=> $this->integer(11)->null()->defaultValue(null),
                'override'=> $this->boolean(1)->null()->defaultValue(0),
                'product_id'=> $this->integer(11)->null()->defaultValue(null),
                'service_name'=> $this->string(255)->null()->defaultValue(null),
                'customer_selection_show'=> $this->tinyInteger(1)->null()->defaultValue(0),
                'service_image_path'=> $this->string(255)->null()->defaultValue(null),
                'service_status'=> $this->integer(11)->null()->defaultValue(1),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%1_product_service}}');
    }
}
