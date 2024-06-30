<?php

/**
 * Defining for initializing locale, charset, and timezone settings.
 * 
 * - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
 * 
 * This method sets up various locale-related configurations and ensures
 * that they are only set once for the instance.
 * 
 * - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
 * 
 * - Sets the default locale for the `intl` extension using `ini_set`.
 * - Configures locale settings for all categories using `setlocale`.
 * - Optionally sets the default timezone if provided using `date_default_timezone_set`.
 * 
 */

$localeInfos = \UpiCore\Config\Config::get('Localization');

$localization = new \UpiCore\Localization\LanguageLocale\LocaleCollection(
    $localeInfos
);

$currentLocale = $localization->current();

// set current localization
new \UpiCore\Localization\Internationalization(
    $currentLocale->getLanguageCode(),
    $currentLocale->getCharset(),
    $currentLocale->getTimezone()
);

// Set accepted languages
\UpiCore\Localization\Internationalization::setAcceptedLanguages(
    $localeInfos->SUPPORTED_LANGUAGES
);
