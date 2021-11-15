<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m211113_104042_add_source_column_source_id_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'source', $this->string()->defaultValue(null));
        $this->addColumn('{{%user}}', 'source_id', $this->string()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'source');
        $this->dropColumn('{{%user}}', 'source_id');
    }
}
