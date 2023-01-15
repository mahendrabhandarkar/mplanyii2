<?php

use yii\db\Schema;
use yii\db\Migration;

class m221124_073804_account_setting extends Migration
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
            '{{%account_setting}}',
            [
                'id'=> $this->primaryKey(11),
                'user_id'=> $this->integer(11)->notNull(),
                'display_mobile'=> $this->integer(11)->notNull()->defaultValue(1),
                'display_email'=> $this->integer(11)->notNull()->defaultValue(1),
                'display_profile'=> $this->integer(11)->notNull()->defaultValue(1),
            ],$tableOptions
        );

    }

    public function safeDown()
    {
        $this->dropTable('{{%account_setting}}');
    }
}
