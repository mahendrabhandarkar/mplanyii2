<?php

use yii\db\Schema;
use yii\db\Migration;

class m221124_071703_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_tbl_1_product_master_product_type_id',
            '{{%1_product_master}}','product_type_id',
            '{{%1_product_type_master}}','product_type_id',
            'CASCADE','CASCADE'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_tbl_1_product_master_product_type_id', '{{%1_product_master}}');
    }
}
