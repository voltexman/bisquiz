<?php

use yii\widgets\Menu;

$active = 'mm-active';

?>
<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button"
                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">

            <?= Menu::widget([
                'options' => ['class' => 'vertical-nav-menu'],
                'items' => [
                    ['label' => 'Создание квиза', 'options' => ['class' => 'app-sidebar__heading']],
                    // Important: you need to specify url as 'controller/action',
                    // not just as 'controller' even if default action is used.
                    ['label' => '<i class="metismenu-icon pe-7s-display2"></i>Мои квизы', 'url' => ['quiz/index']],
                    ['label' => '<i class="metismenu-icon pe-7s-menu"></i>Все вопросы', 'url' => ['question/index']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
                'encodeLabels' => false,
                'linkTemplate' => '<a href="{url}">{label}</a>',
                'activateParents' => true,
                'activateItems' => true,
                'activeCssClass' => 'mm-active',
            ]); ?>

        </div>
    </div>
</div>
