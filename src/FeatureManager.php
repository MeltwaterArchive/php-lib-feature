<?php

namespace DataSift\Feature;

use DataSift\Feature\Driver\Services\DriverInterface;

/**
 * Class FeatureManager
 *
 * @package DataSift\Feature
 */
class FeatureManager
{
    /**
     * @var DriverInterface
     */
    protected $driver;

    /**
     * FeatureManager constructor.
     *
     * @param DriverInterface $driver
     */
    public function __construct(DriverInterface $driver)
    {
        $this->driver = $driver;
    }

    /**
     * Is the feature flag enabled
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return bool
     */
    public function isEnabled($key, $default = false)
    {
        $value = $this->driver->get($key, $default);

        if (is_string($value) && ($value == '' || $value == 'false')) {
            return false;
        }

        return (bool) $value;
    }
}
