<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%mix_and_match}}`.
 */
class m211021_025332_create_mix_and_match_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mix_and_match}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->unique(),
            'slug' => $this->string()->notNull(),
            'image' => $this->string()->notNull(),
            'mixed_product_id' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'status' => $this->smallInteger(2)->defaultValue(1)->comment('0 for inactive, 1 for active'),
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
        $this->dropTable('{{%mix_and_match}}');
    }
}
