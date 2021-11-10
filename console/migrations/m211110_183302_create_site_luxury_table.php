<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%site_luxury}}`.
 */
class m211110_183302_create_site_luxury_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%site_luxury}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'image' => $this->string()->notNull(),
            'link' => $this->string(),
            'status' => $this->smallInteger(2)->defaultValue(1)->comment('0 for inactive, 1 for active'),
            'note' => $this->text(),
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
        $this->dropTable('{{%site_luxury}}');
    }
}
