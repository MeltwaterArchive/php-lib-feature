<?php

use DataSift\Feature\FeatureManager;

require __DIR__ . '/../vendor/autoload.php';

$file = isset($argv[2]) ? $argv[2] : __DIR__ . '/data/test.json';

$feature = new FeatureManager([
    'driver' => 'file',
    'file' => $file
]);

$key = isset($argv[1]) ? $argv[1] : 'test';
$value = $feature->isEnabled($key);

echo "[{$key}] is " . ($value ? "enabled" : "disabled") . "\n";
