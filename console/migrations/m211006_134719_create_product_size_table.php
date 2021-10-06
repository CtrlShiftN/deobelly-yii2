<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_size}}`.
 */
class m211006_134719_create_product_size_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_size}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'slug' => $this->string()->unique(),
            'status' => $this->smallInteger()->defaultValue(1)->comment('0 for inactive, 1 for active'),
            'admin_id' => $this->bigInteger(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_size}}');
    }
}
