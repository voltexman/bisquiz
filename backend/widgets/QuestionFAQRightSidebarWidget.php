<?php


namespace backend\widgets;


use yii\base\Widget;

class QuestionFAQRightSidebarWidget extends Widget
{
    public function run()
    {
        parent::run();

        return $this->render('question-faq-right-sidebar-widget');
    }
}