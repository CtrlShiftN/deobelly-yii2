<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%posts_tag}}`.
 */
class m210829_150538_create_posts_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%posts_tag}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'slug' => $this->string()->unique(),
            'status' => $this->smallInteger()->defaultValue(1)->comment('0 for inactive, 1 for active'),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%posts_tag}}');
    }
}
