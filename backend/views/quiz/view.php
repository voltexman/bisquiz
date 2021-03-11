<?php

use common\models\Question;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Quiz */
/* @var $questions Question */

$this->title = Html::encode($model->quiz_name);
$this->params['icon'] = 'pe-7s-menu icon-gradient bg-plum-plate';
$this->registerCss('.ui-sortable-helper
{
   background:none;    
   border:none;   
}')

?>
<div class="quiz-view">

    <div class="row">
        <div class="col-sm-6">
            <div class="float-left">
                <?= Html::a('Как правильно писать вопросы?', ['faq'], ['class' => 'mr-2 btn btn-link btn-sm']) ?>
            </div>
            <div class="float-right">
                <div class="dropdown d-inline-block">
                    <button type="button" aria-haspopup="true" aria-expanded="false"
                            data-toggle="dropdown"
                            class="mb-2 dropdown-toggle btn btn-primary">Что сделать?
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-shadow dropdown-menu">
                        <button type="button" class="dropdown-item delete-all-questions">
                            Удалить все
                        </button>
                        <button type="button" tabindex="0" class="dropdown-item collapse-all-questions">
                            Свернуть/Развернуть
                        </button>
                        <button type="button" tabindex="0" class="dropdown-item disable-all-questions">
                            Отключить все
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?php Pjax::begin(['id' => 'questionsList']) ?>
            <div class="sortable">
                <?php foreach ($questions->getModels() as $question) : ?>
                    <div class="question" id="<?= $question->id ?>">
                        <div class="card-hover-shadow-2x mb-3 card">
                            <div class="card-header"><i
                                        class="header-icon pe-7s-menu icon-gradient bg-plum-plate"> </i>№ <?= $question->sort ?>
                                <div class="ml-3 card-title-question-name"></div>
                                <div class="btn-actions-pane-right actions-icon-btn">
                                    <a href="<?= Url::to(['question/delete', 'id' => $question->id]) ?>"
                                       class="btn-icon btn-icon-only btn btn-link btn-delete-question">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                    <span class="btn-icon btn-icon-only btn btn-link sortable-handle">
                                        <i class="fa fa-arrows-alt"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="collapse-block card">
                                <div class="card-body">
                                    <div class="card-body-question-name">
                                        <h4><?= Html::encode($question->question_name) ?></h4>
                                    </div>
                                    <div class="d-block">
                                        <?php foreach ($question->answers as $answer) : ?>
                                            <div class="mb-2 mr-2 badge p-3 bg-light"><?= Html::encode($answer->answer_name) ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="float-left">
                                        <div class="mb-2 mr-2 badge badge-dot badge-dot-lg badge-secondary">&nbsp</div>
                                        <?= $question->required ? 'Обязательный вопрос' : 'Не обязательный вопрос' ?>
                                        <br>
                                        <div class="mb-2 mr-2 badge badge-dot badge-dot-lg badge-secondary">&nbsp</div>
                                        <?= $question->own ? 'Можно писать свой ответ' : 'Свой ответ не предусмотрен' ?>
                                        <br>
                                        <div class="mb-2 mr-2 badge badge-dot badge-dot-lg badge-secondary">&nbsp</div>
                                        <?= $question->multiple ? 'Можно выбирать несколько ответов' : 'Можно выбрать только один ответ' ?>
                                    </div>
                                </div>
                                <div class="d-block text-right card-footer">
                                    <div class="float-left">
                                        <input type="checkbox" data-on="Вкл"
                                               data-off="Выкл &nbsp" <?= $question->status ? 'checked' : null ?>
                                               data-toggle="toggle"
                                               data-size="small" class="change-status">
                                    </div>
                                    <div class="float-right">
                                        <a href="<?= Url::to(['question/update', 'id' => $question->id]) ?>"
                                           class="btn-edit btn btn-primary btn-sm"
                                           data-toggle="modal" data-target=".bd-example-modal-lg">Редактировать <i
                                                    class="fa fa-edit"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php Pjax::end() ?>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"></div>
    </div>
</div>