<?php

use yii\db\Migration;

/**
 * Handles the creation of table `equipment`.
 */
class m180821_135350_create_equipment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('equipment', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('equipment');
    }
}
