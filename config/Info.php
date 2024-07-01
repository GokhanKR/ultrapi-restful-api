<?php

$composerFilePath = __DIR__ . _DS . '..' . _DS . 'composer.json';

$composerData = json_decode(file_get_contents($composerFilePath), true);

return [
    'API_NAME'      => $composerData['extra']['name'],
    'API_VERSION'   => $composerData['extra']['version'] ?? null,
];
