<?php

use yii\helpers\Html; ?>
<div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="app-footer__inner">
            <div class="app-footer-left">

                <?= Html::a('Добавить вопрос', ['create'], ['class' => 'mr-3 btn btn-shadow btn-primary btn-add']) ?>

                <?= Html::button('Сохранить <i class="fa fa-save" aria-hidden="true"></i>', ['class' => 'mr-3 btn btn-shadow btn-success btn-save disabled']) ?>

                <?= Html::button('Посмотреть <i class="fa fa-eye" aria-hidden="true"></i>', ['class' => 'btn btn-shadow btn-info disabled btn-view']) ?>

            </div>
            <div class="app-footer-right">

            </div>
        </div>
    </div>
</div>
