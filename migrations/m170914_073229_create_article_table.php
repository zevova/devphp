<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m170914_073229_create_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'alias' => $this->string(128)->unique()->notNull(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text(),
            'image' => $this->string(128),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->integer()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('article');
    }
}
