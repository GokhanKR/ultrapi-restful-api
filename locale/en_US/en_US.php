<?php

$methodMessages     = require 'translations' . _DS . 'MethodMessages.php';
$errorMessages      = require 'translations' . _DS . 'ErrorMessages.php';

return [
    ...$methodMessages,
    ...$errorMessages
];
