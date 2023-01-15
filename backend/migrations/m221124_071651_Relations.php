<?php

use yii\db\Schema;
use yii\db\Migration;

class m221124_071651_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_tbl_1_product_configuration_product_id',
            '{{%1_product_configuration}}','product_id',
            '{{%1_product_master}}','product_id',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_tbl_1_product_configuration_product_service_id',
            '{{%1_product_configuration}}','product_service_id',
            '{{%1_product_service}}','product_service_id',
            'CASCADE','CASCADE'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_tbl_1_product_configuration_product_id', '{{%1_product_configuration}}');
        $this->dropForeignKey('fk_tbl_1_product_configuration_product_service_id', '{{%1_product_configuration}}');
    }
}
