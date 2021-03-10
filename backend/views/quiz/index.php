<?php

use backend\widgets\QuizFAQRightSidebarWidget;
use backend\widgets\QuizNoQuizzesInfoWidget;
use quiz\helpers\QuestionHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мои квизы';
$this->params['icon'] = 'pe-7s-display2 icon-gradient bg-malibu-beach';
$this->params['subtitle'] = 'Список всех доступных квизов';
?>
<div class="quiz-index">

    <?php if ($dataProvider->getModels()) : ?>
        <?php foreach ($dataProvider->getModels() as $quiz) : ?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title font-size-lg text-uppercase font-weight-normal">
                                <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                                <?= $quiz->quiz_name ?>
                            </div>
                            <div class="btn-actions-pane-right text-capitalize">
                                <a href="<?= Url::to(['quiz/update', 'id' => $quiz->id]) ?>"
                                   class="btn-wide btn-outline-2x mr-md-2 btn btn-outline-focus btn-sm">
                                    Изменить
                                </a>
                                <a href="<?= Url::to(['quiz/delete', 'id' => $quiz->id]) ?>"
                                   class="mr-md-2 btn btn-outline-2x btn-outline-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </div>
                        <div class="no-gutters row">
                            <div class="col-sm-6 col-md-4 col-xl-4">
                                <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                                    <div class="icon-wrapper rounded-circle">
                                        <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                                        <i class="lnr-list text-dark opacity-8"></i>
                                    </div>
                                    <div class="widget-chart-content">
                                        <div class="widget-subheading">Вопросов</div>
                                        <div class="widget-numbers"><?= QuestionHelper::getQuestionCount($quiz->id) ?></div>
                                        <div class="widget-description opacity-8 text-focus">
                                            <div class="d-inline text-danger pr-1">
                                                <i class="fa fa-angle-down"></i>
                                                <span class="pl-1">54.1%</span>
                                            </div>
                                            less earnings
                                        </div>
                                    </div>
                                </div>
                                <div class="divider m-0 d-md-none d-sm-block"></div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xl-4">
                                <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                                    <div class="icon-wrapper rounded-circle">
                                        <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                                        <i class="lnr-layers text-white"></i>
                                    </div>
                                    <div class="widget-chart-content">
                                        <div class="widget-subheading">Результатов</div>
                                        <div class="widget-numbers"><span>9M</span></div>
                                        <div class="widget-description opacity-8 text-focus">
                                            Grow Rate:
                                            <span class="text-info pl-1">
                                                    <i class="fa fa-angle-down"></i>
                                                    <span class="pl-1">14.1%</span>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider m-0 d-md-none d-sm-block"></div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-xl-4">
                                <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                                    <div class="icon-wrapper rounded-circle">
                                        <div class="icon-wrapper-bg opacity-9 bg-success"></div>
                                        <i class="lnr-chart-bars text-white"></i>
                                    </div>
                                    <div class="widget-chart-content">
                                        <div class="widget-subheading">Конверсия
                                            <i class="fa fa-fw cursor-pointer" aria-hidden="true"
                                               title="Конверсия - это соотнеошение количества посетителей сайта, заполнивших ответы и отправивших вам результат"
                                               data-toggle="tooltip"></i>
                                        </div>
                                        <div class="widget-numbers text-success"><span>45%</span></div>
                                        <div class="widget-progress-wrapper mt-0">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                     aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: 43%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="scroll-area-lg">
                            <div class="scrollbar-container ps ps--active-y">
                                <ul class="todo-list-wrapper list-group list-group-flush">
                                    <?php foreach ($quiz->questions as $question) : ?>
                                        <li class="list-group-item">
                                            <div class="todo-indicator bg-warning"></div>
                                            <div class="widget-content p-0 pl-2">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading"><?= Html::encode($question->question_name) ?></div>
                                                        <?php foreach ($question->answers as $answer) : ?>
                                                            <div class="badge bg-light"><?= Html::encode($answer->answer_name) ?></div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; height: 400px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 232px;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center d-block p-3 card-footer">
                            <a href="<?= Url::to(['quiz/view', 'id' => $quiz->id]) ?>"
                               class="btn-pill text-white btn-shadow btn-wide fsize-1 btn btn-primary btn-lg">
                                    <span class="mr-2 opacity-7">
                                        <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                                    </span>
                                <span class="mr-1">Перейти к вопросам</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <?= QuizFAQRightSidebarWidget::widget() ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <div class="row">
            <div class="col-sm-6">
                <?= QuizNoQuizzesInfoWidget::widget() ?>
            </div>
        </div>
    <?php endif; ?>

</div>
