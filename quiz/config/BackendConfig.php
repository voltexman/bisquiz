<?php

namespace quiz\config;

use JetBrains\PhpStorm\ArrayShape;

class BackendConfig
{
    #[ArrayShape(['quiz' => "string[]", 'question' => "string[]", 'answer' => "string[]"])]
    public static function translations(): array
    {
        return [
            'header' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@backend/messages',
//                'sourceLanguage' => 'ru-RU',
            ],
            'quiz' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@backend/messages',
//                'sourceLanguage' => 'ru-RU',
            ],
            'question' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@backend/messages',
//                'sourceLanguage' => 'ru-RU',
            ],
            'answer' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@backend/messages',
//                'sourceLanguage' => 'ru-RU',
            ],
        ];
    }
}