<?php

use yii\db\Schema;
use yii\db\Migration;

class m221124_071612_1_asset_upload extends Migration
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
            '{{%1_asset_upload}}',
            [
                'layout_id'=> $this->primaryKey(11),
                'layout_name'=> $this->string(250)->notNull(),
                'image_name'=> $this->string(250)->notNull(),
                'image_path'=> $this->string(250)->notNull(),
                'layout_status'=> $this->tinyInteger(1)->null()->defaultValue(0),
                'option_description'=> $this->string(250)->notNull(),
                'created_date'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'modified_date'=> $this->timestamp()->null()->defaultExpression("CURRENT_TIMESTAMP"),
                'created_by'=> $this->string(250)->null()->defaultValue(null),
                'modified_by'=> $this->string(250)->null()->defaultValue(null),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%1_asset_upload}}');
    }
}
