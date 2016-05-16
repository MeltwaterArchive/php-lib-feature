<?php

use DataSift\Feature\FeatureManager;

require __DIR__ . '/../vendor/autoload.php';

$feature = new FeatureManager([
    'driver' => 'redis',
    'host' => '192.168.10.10'
]);

$key = isset($argv[1]) ? $argv[1] : 'test';
$value = $feature->isEnabled($key);

echo "[{$key}] is " . ($value ? "enabled" : "disabled") . "\n";
