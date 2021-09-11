<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m210911_133429_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'avatar' => $this->string(),
            'thumbnail' => $this->string(),
            'title' => $this->string(),
            'content' => $this->text(),
            'admin_id' => $this->bigInteger(),
            'tag_id' => $this->string(),
            'post_category_id' => $this->bigInteger(),
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
        $this->dropTable('{{%post}}');
    }
}
