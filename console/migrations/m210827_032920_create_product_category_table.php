<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_category}}`.
 */
class m210827_032920_create_product_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->unique()->notNull(),
            'type_id' => $this->bigInteger()->notNull(),
            'status' => $this->smallInteger()->defaultValue(1)->comment('0 for inactive, 1 for active'),
            'admin_id' => $this->bigInteger(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);
        $this->addForeignKey('fk_product_category_type_id', 'product_category', 'type_id', 'product_type', 'id', 'CASCADE');
        $this->addForeignKey('fk_product_category_admin_id', 'product_category', 'admin_id', 'user', 'id', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_product_category_type_id', 'product_category');
        $this->dropForeignKey('fk_product_category_admin_id', 'product_category');
        $this->dropTable('{{%product_category}}');
    }
}
