<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%question}}`.
 */
class m210304_125259_create_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%question}}', [
            'id' => $this->primaryKey(),
            'quiz_id' => $this->integer(),
            'sort' => $this->smallInteger(),
            'question_name' => $this->string(),
            'question_hint' => $this->text(),
            'type' => $this->smallInteger(),
            'multiple' => $this->boolean(),
            'required' => $this->boolean(),
            'own' => $this->boolean(),
            'status' => $this->boolean()
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-post-quiz_id',
            'question',
            'quiz_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-post-quiz_id',
            'question',
            'quiz_id',
            'quiz',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-post-quiz_id',
            'question'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-post-quiz_id',
            'question'
        );

        $this->dropTable('{{%question}}');
    }
}
