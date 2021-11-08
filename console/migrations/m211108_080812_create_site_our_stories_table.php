<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%site_our_stories}}`.
 */
class m211108_080812_create_site_our_stories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%site_our_stories}}', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->null(),
            'image' => $this->string()->notNull(),
            'section' => $this->text()->notNull(),
            'admin_id' => $this->bigInteger()->notNull(),
            'status' => $this->smallInteger(2)->defaultValue(1)->comment('0 for inactive 1 for active'),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%site_our_stories}}');
    }
}
