<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m211013_142705_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->bigInteger()->notNull(),
            'product_id' => $this->bigInteger()->notNull(),
            'color_id' => $this->smallInteger()->null(),
            'size_id' => $this->smallInteger()->null(),
            'quantity' => $this->integer()->notNull(),
            'province' => $this->string()->notNull(),
            'district' => $this->string()->notNull(),
            'village' => $this->string()->notNull(),
            'specific_address' => $this->string()->notNull(),
            'address' => $this->text()->notNull(),
            'notes' => $this->text()->null(),
            'tel' => $this->string()->notNull(),
            'admin_id' => $this->bigInteger()->notNull(),
            'status' => $this->smallInteger()->defaultValue(0)->comment('0 - new,1 - processing,2 - approved,3 - shipping,4 - finished,5- cancelled,6 - expired,7 - returned,8 - postpone,9 - rejected,10 - failed,11 - fake'),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
        $this->createIndex('order_user_id_index','order','user_id');
        $this->createIndex('order_product_id_index','order','product_id');
        $this->createIndex('order_color_id_index','order','color_id');
        $this->createIndex('order_size_id_index','order','size_id');
        $this->createIndex('order_admin_id_id_index','order','admin_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('order_user_id_index','order');
        $this->dropIndex('order_product_id_index','order');
        $this->dropIndex('order_color_id_index','order');
        $this->dropIndex('order_size_id_index','order');
        $this->dropIndex('order_admin_id_index','order');
        $this->dropTable('{{%order}}');
    }
}
