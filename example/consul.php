<?php

use DataSift\Feature\FeatureManager;

require __DIR__ . '/../vendor/autoload.php';

$feature = new FeatureManager([
    'driver' => 'consul'
]);

$key = isset($argv[1]) ? $argv[1] : 'test';
$value = $feature->isEnabled($key);

echo "[{$key}] is " . ($value ? "enabled" : "disabled") . "\n";
