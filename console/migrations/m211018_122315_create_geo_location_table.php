<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%geo_location}}`.
 */
class m211018_122315_create_geo_location_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%geo_location}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),
            'parent' => $this->integer()->notNull(),
            'status' => $this->smallInteger(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%geo_location}}');
    }
}
