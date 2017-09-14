<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m170914_073415_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'sub' => $this->integer(),
            'alias' => $this->string(128)->unique()->notNull(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->string(255),
            'image' => $this->string(128),
            'status' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('category');
    }
}
