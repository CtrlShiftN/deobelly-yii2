<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%meta}}`.
 */
class m210828_021058_add_created_column_updated_column_to_meta_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%meta}}', 'created', $this->dateTime());
        $this->addColumn('{{%meta}}', 'updated', $this->dateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%meta}}', 'created');
        $this->dropColumn('{{%meta}}', 'updated');
    }
}
