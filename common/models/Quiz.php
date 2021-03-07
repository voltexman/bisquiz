<?php

namespace common\models;

use JetBrains\PhpStorm\ArrayShape;
use Yii;

/**
 * This is the model class for table "quiz".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $quiz_name
 * @property string|null $consultant_name
 * @property string|null $consultant_position
 * @property int|null $status
 *
 * @property Question[] $questions
 * @property User $user
 */
class Quiz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'quiz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['user_id', 'status'], 'integer'],
            [['quiz_name', 'consultant_name', 'consultant_position'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'quiz_name' => Yii::t('quiz', 'QUIZ_NAME'),
            'consultant_name' => Yii::t('quiz', 'CONSULTANT_NAME'),
            'consultant_position' => Yii::t('quiz', 'CONSULTANT_POSITION'),
            'status' => Yii::t('quiz', 'STATUS'),
        ];
    }

    /**
     * Gets query for [[Questions]].
     *
     * @return \yii\db\ActiveQuery|QuestionQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::class, ['quiz_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return QuizQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new QuizQuery(get_called_class());
    }
}
