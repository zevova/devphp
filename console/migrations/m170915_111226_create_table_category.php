<?php

use yii\db\Migration;

class m170915_111226_create_table_category extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%category}}', [
            'id' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'parent_id' => $this->integer(11),
            'alias' => $this->string(128)->notNull(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'image' => $this->string(128),
            'status' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->createIndex('alias', '{{%category}}', 'alias', true);
        $this->createIndex('id', '{{%category}}', 'id', true);
    }

    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
