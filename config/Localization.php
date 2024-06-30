<?php

$localeInfos = [

    'en_US' => [
        'CODE' => 'en_US',
        'CHARSET' => 'UTF-8',
        'TIMEZONE' => 'America/New_York',
        'LANGUAGE_NAME' => 'English',
        'COUNTRY' => 'United States',
        'DATE_FORMAT' => 'm/d/Y',
        'TIME_FORMAT' => 'h:i:s A',
        'CURRENCY' => 'USD',
        'NUMBER_FORMAT' => [
            'DECIMAL_SEPARATOR' => '.',
            'THOUSAND_SEPARATOR' => ','
        ]
    ],

    'tr_TR' => [
        'CODE' => 'tr_TR',
        'CHARSET' => 'UTF-8',
        'TIMEZONE' => 'Asia/Istanbul',
        'LANGUAGE_NAME' => 'Türkçe',
        'COUNTRY' => 'Turkey',
        'DATE_FORMAT' => 'd.m.Y',
        'TIME_FORMAT' => 'H:i:s',
        'CURRENCY' => 'TRY',
        'NUMBER_FORMAT' => [
            'DECIMAL_SEPARATOR' => ',',
            'THOUSAND_SEPARATOR' => '.'
        ]
    ],

];

$defaultLocale = $localeInfos['en_US'];

return [
    'DEFAULT_LOCALE'        => $defaultLocale,
    'LOCALE_INFOS'          => $localeInfos,
    'SUPPORTED_LANGUAGES'   => \array_values($localeInfos),
];
