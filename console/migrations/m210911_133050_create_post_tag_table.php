<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_tag}}`.
 */
class m210911_133050_create_post_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post_tag}}', [
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
        $this->dropTable('{{%post_tag}}');
    }
}
