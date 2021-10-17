<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cart}}`.
 */
class m211013_142507_create_cart_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cart}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->bigInteger()->notNull(),
            'product_id' => $this->bigInteger()->notNull(),
            'color_id' => $this->smallInteger()->null(),
            'size_id' => $this->smallInteger()->null(),
            'quantity' => $this->integer()->notNull(),
            'total_price' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->defaultValue(1)->comment('0 for inactive, 1 for active'),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
        $this->createIndex('cart_user_id_index','cart','user_id');
        $this->createIndex('cart_product_id_index','cart','product_id');
        $this->createIndex('cart_color_id_index','cart','color_id');
        $this->createIndex('cart_size_id_index','cart','size_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('cart_user_id_index','cart');
        $this->dropIndex('cart_product_id_index','cart');
        $this->dropIndex('cart_color_id_index','cart');
        $this->dropIndex('cart_size_id_index','cart');
        $this->dropTable('{{%cart}}');
    }
}
