<?php

use yii\db\Migration;

/**
 * Handles the creation of table `model_equipment`.
 * Has foreign keys to the tables:
 *
 * - `model`
 * - `equipment`
 */
class m180821_135706_create_junction_table_for_model_and_equipment_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('model_equipment', [
            'model_id' => $this->integer(),
            'equipment_id' => $this->integer(),
            'PRIMARY KEY(model_id, equipment_id)',
        ]);

        // creates index for column `model_id`
        $this->createIndex(
            'idx-model_equipment-model_id',
            'model_equipment',
            'model_id'
        );

        // add foreign key for table `model`
        $this->addForeignKey(
            'fk-model_equipment-model_id',
            'model_equipment',
            'model_id',
            'model',
            'id',
            'CASCADE'
        );

        // creates index for column `equipment_id`
        $this->createIndex(
            'idx-model_equipment-equipment_id',
            'model_equipment',
            'equipment_id'
        );

        // add foreign key for table `equipment`
        $this->addForeignKey(
            'fk-model_equipment-equipment_id',
            'model_equipment',
            'equipment_id',
            'equipment',
            'id',
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
            'fk-model_equipment-model_id',
            'model_equipment'
        );

        // drops index for column `model_id`
        $this->dropIndex(
            'idx-model_equipment-model_id',
            'model_equipment'
        );

        // drops foreign key for table `equipment`
        $this->dropForeignKey(
            'fk-model_equipment-equipment_id',
            'model_equipment'
        );

        // drops index for column `equipment_id`
        $this->dropIndex(
            'idx-model_equipment-equipment_id',
            'model_equipment'
        );

        $this->dropTable('model_equipment');
    }
}
