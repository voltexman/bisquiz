<?php


namespace quiz\helpers;


use common\models\Question;
use Yii;

class QuestionHelper
{
    const MAX_LENGTH_QUESTION_HINT = 300;

    public static function typeList(): array
    {
        return [
            Question::TYPE_TEXT => Yii::t('question', 'TYPE_TEXT'),
            Question::TYPE_IMAGE => Yii::t('question', 'TYPE_IMAGE')
        ];
    }

    public static function getQuestionCount($quizId): int
    {
        return Question::find()->where(['quiz_id' => $quizId])->count();
    }

    public static function getPublishedCount($quiz_id): int
    {
        return Question::find()->where([
            'quiz_id' => $quiz_id,
            'status' => Question::PUBLISHED_STATUS_ON
        ])->count();
    }
}