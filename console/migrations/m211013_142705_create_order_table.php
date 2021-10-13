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
            'color' => $this->string()->null(),
            'size' => $this->string()->null(),
            'quantity' => $this->integer()->notNull(),
            'is_order' => $this->smallInteger()->comment('0:no; 1:yes'),
            'is_shipping' => $this->smallInteger()->comment('0:no; 1:yes'),
            'is_delivered' => $this->smallInteger()->comment('0:no; 1:yes'),
            'is_cancelled' => $this->smallInteger()->comment('0:no; 1:yes'),
            'is_portpone' => $this->smallInteger()->comment('0:no; 1:yes'),
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
        $this->dropTable('{{%order}}');
    }
}
