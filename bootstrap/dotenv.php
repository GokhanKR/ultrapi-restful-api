<?php

$envPath = realpath(__DIR__ . _DS . '..');

if (\is_file($envPath . _DS . '.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable($envPath);
    $dotenv->load();
}
