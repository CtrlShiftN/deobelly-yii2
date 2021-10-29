<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tailor_made_order}}`.
 */
class m211028_021956_create_tailor_made_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tailor_made_order}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->bigInteger(),
            'customer_name' => $this->string()->notNull(),
            'customer_tel' => $this->string()->notNull(),
            'customer_email' => $this->string()->notNull(),
            'body_image' => $this->string(),
            'type' => $this->smallInteger(2)->notNull()->comment('0 for top, 1 for trousers, 2 for set'),
            'height' => $this->float(),
            'weight' => $this->float(),
            'neck' => $this->float(),
            'shoulder' => $this->float(),
            'chest' => $this->float(),
            'arm' => $this->float(),
            'waist' => $this->float(),
            'wrist' => $this->float(),
            'waist_to_floor' => $this->float(),
            'waist_to_knee' => $this->float(),
            'ankle' => $this->float(),
            'hip' => $this->float(),
            'buttock' => $this->float(),
            'knee' => $this->float(),
            'thigh' => $this->float(),
            'biceps' => $this->float(),
            'notes' => $this->text(),
            'status' => $this->smallInteger(2)->defaultValue(1)->comment('0 for inactive 1 for active'),
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
        $this->dropTable('{{%tailor_made_order}}');
    }
}
