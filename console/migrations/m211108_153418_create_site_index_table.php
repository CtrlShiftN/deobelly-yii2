<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%site_index}}`.
 */
class m211108_153418_create_site_index_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%site_index}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'label' => $this->string(),
            'image' => $this->string(),
            'content' => $this->text(),
            'link' => $this->string(),
            'type' => $this->string()->comment('image, image link or text, text link, see more link, mix(image, text, link)'),
            'section' => $this->string()->notNull(),
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
        $this->dropTable('{{%site_index}}');
    }
}
