<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m210827_022555_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->unique()->notNull(),
            'short_description' => $this->string()->null(),
            'description' => $this->text()->notNull(),
            'cost_price' => $this->decimal(13, 0)->notNull(),
            'regular_price' => $this->decimal(13, 0)->notNull(),
<<<<<<< HEAD
            'sale_price' => $this->decimal(13, 0)->null()->comment("doesn't sale: sale_price = regular_price"),
=======
            'sale_price' => $this->decimal(13, 0)->null(),
            'selling_price' => $this->decimal(13, 0)->notNull(),
>>>>>>> 37a54b3d3d68ea6a47f198d34666835e534f0e43
            'SKU' => $this->string()->null(),
            'quantity' => $this->integer()->defaultValue(0)->notNull(),
            'image' => $this->string()->notNull(),
            'images' => $this->text()->null(),
            'is_luxury' => $this->smallInteger(2)->defaultValue(1)->comment('0 for basic, 1 for luxury'),
            'related_product' => $this->string(),
            'gender' => $this->smallInteger(2)->defaultValue(2)->comment('0 for female, 1 for male, 2 for both'),
            'trademark_id' => $this->bigInteger()->null(),
            'viewed' => $this->integer()->defaultValue(0)->comment('+1 each click to view'),
            'fake_sold' => $this->integer()->defaultValue(rand(999, 99999))->comment('client see this amount if sold < 1k'),
            'sold' => $this->integer()->defaultValue(0),
            'status' => $this->smallInteger()->defaultValue(1)->comment('0 for inactive, 1 for active'),
            'admin_id' => $this->bigInteger(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);
        $this->createIndex('product_name_index', 'product', 'name');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('product_name_index', 'product');
        $this->dropTable('{{%product}}');
    }
}
