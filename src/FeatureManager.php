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
     * @param string|array $keys
     * @param mixed        $default
     *
     * @return bool
     */
    public function isEnabled($keys, $default = false)
    {
        if (! is_array($keys)) {
            $keys = array($keys);
        }
        
        foreach ($keys as $key) {
            $value = $this->driver->get($key, $default);
            if ((is_string($value) && ($value == '' || $value == 'false')) || $value != true) {
                return false;
            }
        }

        return true;
    }

    /**
     * Inverse function for the isEnabled method
     *
     * @param string|array $keys
     * @param bool         $default
     *
     * @return bool
     */
    public function isNotEnabled($keys, $default = false)
    {
        return ! $this->isEnabled($keys, $default);
    }
}
