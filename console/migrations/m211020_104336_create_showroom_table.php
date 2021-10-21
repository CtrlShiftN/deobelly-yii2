<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%showroom}}`.
 */
class m211020_104336_create_showroom_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%showroom}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'slug' => $this->string()->notNull(),
            'image' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'tel' => $this->string()->notNull(),
            'gps_link' => $this->string()->notNull(),
            'status' => $this->smallInteger(2)->defaultValue(1)->comment('0 for inactive 1 for active'),
            'admin_id' => $this->bigInteger(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%showroom}}');
    }
}
