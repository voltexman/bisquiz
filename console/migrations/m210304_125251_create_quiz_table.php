<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%quiz}}`.
 */
class m210304_125251_create_quiz_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%quiz}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'quiz_alias' => $this->string(),
            'quiz_name' => $this->string(),
            'consultant_name' => $this->string(),
            'consultant_position' => $this->string(),
            'status' => $this->boolean()
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            'idx-post-user_id',
            'quiz',
            'user_id'
        );

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-post-user_id',
            'quiz',
            'user_id',
            'user',
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
            'fk-post-user_id',
            'quiz'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            'idx-post-user_id',
            'quiz'
        );

        $this->dropTable('{{%quiz}}');
    }
}
