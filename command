#!/usr/bin/env php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$scriptName = $argv[1];

require_once(__DIR__ . DIRECTORY_SEPARATOR . "/src/CacheDataProvider.php");

$cacheDataProvider = new \App\CacheDataProvider();

try {
    $cacheService = $cacheDataProvider->getService($scriptName);
} catch (Exception $exception) {
    print_r($exception->getMessage());
    exit;
}

require_once __DIR__ . '/bin/' . $scriptName;
