<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%answer}}`.
 */
class m210304_125306_create_answer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%answer}}', [
            'id' => $this->primaryKey(),
            'question_id' => $this->integer(),
            'sort' => $this->smallInteger(),
            'answer_name' => $this->string(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-post-question_id',
            'answer',
            'question_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-post-question_id',
            'answer',
            'question_id',
            'question',
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
          'fk-post-question_id',
          'answer'
      );

      // drops index for column `category_id`
      $this->dropIndex(
          'idx-post-question_id',
          'answer'
      );

        $this->dropTable('{{%answer}}');
    }
}
