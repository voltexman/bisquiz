<?php


namespace backend\widgets;


use yii\base\Widget;

class QuizFAQRightSidebarWidget extends Widget
{
    public function run()
    {
        parent::run();

        return $this->render('quiz-faq-right-sidebar-widget');
    }
}