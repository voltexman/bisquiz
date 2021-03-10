<?php

use quiz\helpers\QuestionHelper;
use quiz\helpers\QuizHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$getId = Yii::$app->request->get('id');
$hostInfo = Yii::$app->request->hostInfo;
$userName = Yii::$app->user->identity->getUsername();

?>
<div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="app-footer__inner">
            <div class="app-footer-left">

                <!--                --><?php //Pjax::begin(['id' => 'footerButtons']) ?>
                <?php if (Yii::$app->requestedRoute == 'quiz/index') : ?>
                    <a href="<?= Url::to(['create']) ?>" class="mr-3 btn btn-shadow btn-primary btn-add">Добавить квиз
                        <i class="fa fa-plus" aria-hidden="true"></i></a>
                <?php elseif (Yii::$app->requestedRoute == 'quiz/view') : ?>
                    <?= Html::a('Добавить вопрос <i class="fa fa-plus" aria-hidden="true"></i>', ['create'], ['class' => 'mr-3 btn btn-shadow btn-primary btn-add']) ?>
                <?php endif; ?>

                <?php if (Yii::$app->requestedRoute == 'quiz/create' || Yii::$app->requestedRoute == 'quiz/update') : ?>
                    <?= Html::button('Сохранить <i class="fa fa-save" aria-hidden="true"></i>', ['class' => 'mr-3 btn btn-shadow btn-success btn-save']) ?>
                <?php endif; ?>

                <?php if (Yii::$app->requestedRoute == 'quiz/index' && QuizHelper::getPublishedCount() >= 1) : ?>

                    <a href="javascript:void()" class="btn btn-shadow btn-info btn-view">Посмотреть
                        <i class="fa fa-eye" aria-hidden="true"></i></a>

                <?php elseif (Yii::$app->requestedRoute == 'quiz/view' && QuestionHelper::getPublishedCount($getId) >= 1) : ?>
                    <a href="<?= Url::to($hostInfo . '/' . $userName . '/' . QuizHelper::getQuizAlias($getId)) ?>"
                       target="_blank" class="btn btn-shadow btn-info btn-view">Посмотреть
                        <i class="fa fa-eye" aria-hidden="true"></i></a>
                <?php endif; ?>
                <!--                --><?php //Pjax::end() ?>

            </div>
            <div class="app-footer-right"></div>
        </div>
    </div>
</div>
