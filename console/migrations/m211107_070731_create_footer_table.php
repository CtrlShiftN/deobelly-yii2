<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%footer}}`.
 */
class m211107_070731_create_footer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%footer}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'slug' => $this->string()->notNull()->unique(),
            'link' => $this->string()->notNull(),
            'parent_id' => $this->integer()->notNull(),
            'status' => $this->smallInteger(2)->defaultValue(1)->comment('0 for inactive, 1 for active'),
            'admin_id' => $this->bigInteger(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
        $this->createIndex('footer_parent_id_index', 'footer', 'parent_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('footer_parent_id_index','footer');
        $this->dropTable('{{%footer}}');
    }
}
