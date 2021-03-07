<?php


namespace quiz\helpers;


use common\models\Question;

class QuestionHelper
{
    public static function getQuestionCount($quizId): int
    {
        return Question::find()->where(['quiz_id' => $quizId])->count();
    }
}