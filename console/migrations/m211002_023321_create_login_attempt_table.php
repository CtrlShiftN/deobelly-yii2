<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%login_attempt}}`.
 */
class m211002_023321_create_login_attempt_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%login_attempt}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string(),
            'amount' => $this->integer(2),
            'reset_at' => $this->integer(11),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ]);
        $this->createIndex('login_attempt_key_index','login_attempt','key');
        $this->createIndex('login_attempt_amount_index','login_attempt','amount');
        $this->createIndex('login_attempt_reset_at_index','login_attempt','reset_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('login_attempt_key_index','login_attempt');
        $this->dropIndex('login_attempt_amount_index','login_attempt');
        $this->dropIndex('login_attempt_reset_at_index','login_attempt');
        $this->dropTable('{{%login_attempt}}');
    }
}
