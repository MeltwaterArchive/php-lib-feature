<?php

use DataSift\Feature\Driver\Services\ArrayDriver;
use DataSift\Feature\FeatureManager;

require __DIR__ . '/../vendor/autoload.php';

$data = json_decode(file_get_contents('data/test.json'), true);

$feature = new FeatureManager(
    new ArrayDriver($data)
);

$key = isset($argv[1]) ? $argv[1] : 'test';
$value = $feature->isEnabled($key);

echo "[{$key}] is " . ($value ? "enabled" : "disabled") . "\n";
