<?php


namespace backend\widgets;


use yii\base\Widget;

class QuizNoQuizzesInfoWidget extends Widget
{
    public function run()
    {
        parent::run();

        return $this->render('quiz-no-quizzes-info-widget');
    }
}