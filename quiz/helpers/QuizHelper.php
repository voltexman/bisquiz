<?php


namespace quiz\helpers;


use common\models\Quiz;

class QuizHelper
{
    public static function getQuizCount()
    {

    }

    public static function isPublished($quiz_id): bool
    {
        return Quiz::find()->where([
            'id' => $quiz_id,
            'status' => Quiz::PUBLICATION_STATUS_ON
        ]) ? true : false;
    }

    public static function getQuizAlias($quiz_id): string
    {
        return Quiz::findOne($quiz_id)->quiz_alias;
    }

    public static function getPublishedCount(): int
    {
        return Quiz::find()->where(['status' => Quiz::PUBLICATION_STATUS_ON])->count();
    }
}