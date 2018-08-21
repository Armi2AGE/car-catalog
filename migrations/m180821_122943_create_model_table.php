<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation of table `model`.
 */
class m180821_122943_create_model_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Create table
        $this->createTable('model', [
            'id' => $this->primaryKey(),
            'brand_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'description' => $this->text(),
            'photo' => $this->string()
        ]);

        // Create index for foreign key
        $this->createIndex(
            'idx-model-brand_id',
            'model',
            'brand_id'
        );

        // Add foreign key for table 'brand'
        $this->addForeignKey(
            'fk-model-brand_id',
            'model',
            'brand_id',
            'brand',
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
        // drops foreign key for table `brand`
        $this->dropForeignKey(
            'fk-model-brand_id',
            'model'
        );

        // drops index for column `brand_id`
        $this->dropIndex(
            'idx-model-brand_id',
            'model'
        );

        $this->dropTable('model');
    }
}
