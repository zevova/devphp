<?php

use yii\db\Migration;

class m170915_111226_create_table_tag extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tag}}', [
            'id' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'alias' => $this->string(128)->notNull(),
            'title' => $this->string(255)->notNull(),
            'status' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->createIndex('alias', '{{%tag}}', 'alias', true);
    }

    public function safeDown()
    {
        $this->dropTable('{{%tag}}');
    }
}
