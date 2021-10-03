<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%meta}}`.
 */
class m210828_020051_create_meta_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%meta}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string()->unique()->notNull(),
            'value' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%meta}}');
    }
}
