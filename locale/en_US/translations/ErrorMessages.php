<?php

return [
    "ROUTER" => [
        "ROUTER_REQUEST_METHOD_ERR" => "Request method not provided!",
        "ROUTER_WITH_UPLOADED_FILE_NOT_FOUND" => "File not found: %s",
        "ROUTER_CLIENT_IS_NOT_INITIALIZED" => "Client is not initialized, please initialize the Router",
        "ROUTER_INIT_TYPEOF_ERR" => "(Router->_init) must be return instance of '\UpiCore\Controller\Interfaces\ControllerInterface'",
        "ROUTER_OUT_TYPEOF_ERR" => "(Router->_out) must be return instance of '\UpiCore\Router\RouterContext'",
        "ROUTER_CONTENT_TYPE_UNSUPPORTED" => "500/Content Type doesn't support.",
        "ROUTER_RECEIVED_DATA_NOT_VALID" => "500/Received data is not valid.",
        "ROUTER_AUTH_ERR" => "500/Authentication failed.",
        "ROUTER_REQUEST_METHOD_IS_NOT_ALLOWED" => "500/Request method is not allowed.",
        "ROUTER_INVALID_CHARS_IN_HEADER" => "Header '%s' contains invalid characters.",
        "ROUTER_CONTEXT_INTERPRETATIN_NOT_SPECIFIED" => "Interpretation is not specified in RouterContext. Please define the server Content-Type.",
        "ROUTER_INVALID_URI" => "Invalid URI: %s",
    ],

    "CONFIG" => [
        "CONFIG_PATH_IS_NOT_DEFINED" => "Config path is not defined",
        "CONFIG_PATH_NOT_FOUND" => "Config directory not found: %s",
    ],

    "LOCALIZATION" => [
        "LOCALIZATION_TRANSLATION_NOT_FOUND" => "500/Translate not found.",
        "LOCALIZATION_DEFAULT_LOCALE_NOT_SPECIFIED" => "500/Default locale is not specified!.",
        "LOCALIZATION_LOCALE_PATH_NOT_DEFINED" => "500/Localization path is not defined.",
        "LOCALIZATION_LOCALE_PATH_NOT_EXISTS" => "500/Localization path is not exists.",
        "LOCALIZATION_INVALID_LANGUAGE_CODE" => "500/Invalid language code provided.",
        "LOCALIZATION_EMPTY_CHARSET_ERR" => "500/Charset cannot be empty.",
        "LOCALIZATION_DEFAULT_LOCALE_FAILED" => "500/Failed to set default locale.",
        "LOCALIZATION_LOCALE_SET_FAILED" => "500/Failed to set locale.",
        "LOCALIZATION_TIMEZONE_SET_FAILED" => "500/Failed to set timezone.",
    ],

    "METHOD" => [
        "METHOD_LOCALE_PATH_NOT_DEFINED" => "500/Methods path is not defined.",
        "METHOD_LOCALE_PATH_NOT_EXISTS" => "500/Methods path is not exists.",
        "METHOD_REQUEST_METHOD_REQUIRED" => "500/Request method not sent!",
        "METHOD_REQUEST_METHOD_NOT_VALID" => "500/Request method not valid!",
        "METHOD_REQUEST_METHOD_NOT_FOUND" => "500/Request method not found!",
        "METHOD_REQUEST_METHOD_DONT_REGISTER" => "500/Request method (%s) can't be registered because it's not valid or doesn't exist!",
        "METHOD_CALL_METHOD_NOT_FOUND" => "500/Call method not found: (%s)",
        "METHOD_HANDLING_INTERFACE_ERR" => "500/The method must be an instance of 'MethodInterface'!",
        "METHOD_METHOD_INACCESSIBLE" => "500/Method is not accessible!",
        "METHOD_METHOD_DONT_HAVE_RESULT" => "500/Method not defined for the result!",
        "METHOD_API_PARAMS_ERR" => "500/Please provide all parameters",
        "METHOD_API_VAR_TYPE_ERR" => "500/Please provide parameters in the required type (%s:%s)",
    ],

    "HTTP" => [
        "HTTP_STATUS_503" => "503/An error occurred: %s",
        "HTTP_BROWSER_VIEW" => "200/API response was successfully returned",
    ],

    "EXCEPTION" => [
        'EXCEPTION_ROUTER_CXT_NOT_PROVIDED' => '500/RouterContext is not provided in UpiException'
    ],

    "CEREMONY" => [
        "CEREMONY_PATH_NOT_DEFINED" => "500/Destination path not defined! Please define the application path."
    ]
];
