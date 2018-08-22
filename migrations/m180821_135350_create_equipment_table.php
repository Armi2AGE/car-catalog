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
            'model_id' => $this->integer()->notNull(),
            'name' => $this->string(),
            'description' => $this->text()
        ]);

        // Create index for foreign key
        $this->createIndex(
            'idx-equipment-model_id',
            'equipment',
            'model_id'
        );

        // Add foreign key for table 'model'
        $this->addForeignKey(
            'fk-equipment-model_id',
            'equipment',
            'model_id',
            'model',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `model`
        $this->dropForeignKey(
            'fk-equipment-model_id',
            'equipment'
        );

        // drops index for column `model_id`
        $this->dropIndex(
            'idx-equipment-model_id',
            'equipment'
        );
        $this->dropTable('equipment');
    }
}
