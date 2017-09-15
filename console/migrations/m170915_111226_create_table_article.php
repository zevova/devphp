<?php

use yii\db\Migration;

class m170915_111226_create_table_article extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%article}}', [
            'id' => $this->bigInteger(20)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'user_id' => $this->integer(128)->notNull(),
            'alias' => $this->string(128)->notNull(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'image' => $this->string(64),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
            'status' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->createIndex('alias', '{{%article}}', 'alias', true);
    }

    public function safeDown()
    {
        $this->dropTable('{{%article}}');
    }
}
