<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products_category}}`.
 */
class m210827_032920_create_products_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->unique()->notNull(),
            'code' => $this->bigInteger()->unique()->comment("first letter is product type, the rest is code number")->notNull(),
            'status' => $this->smallInteger()->defaultValue(1)->comment('0 for inactive, 1 for active'),
            'admin_id' => $this->bigInteger(),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products_category}}');
    }
}
