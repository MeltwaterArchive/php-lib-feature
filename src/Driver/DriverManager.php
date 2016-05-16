<?php

namespace DataSift\Feature\Driver;

use DataSift\Feature\Driver\Services\ArrayDriver;
use DataSift\Feature\Driver\Services\ConsulDriver;
use DataSift\Feature\Driver\Services\DriverInterface;
use DataSift\Feature\Driver\Services\FileDriver;
use DataSift\Feature\Driver\Services\RedisDriver;

class DriverManager
{
    /**
     * Static alias method for initialising drivers
     *
     * @param array $config
     *
     * @return DriverInterface
     *
     * @throws UnknownDriver
     */
    public static function loadDriver(array $config)
    {
        $driver = new self();
        return $driver->driver($config);
    }

    /**
     * Initialise the file driver, with the configuration settings
     *
     * @param $config
     *
     * @return FileDriver
     */
    public function createFileDriver($config)
    {
        return new FileDriver($config);
    }

    /**
     * Initialise the array driver, with the configuration settings
     *
     * @param $config
     *
     * @return ArrayDriver
     */
    public function createArrayDriver($config)
    {
        return new ArrayDriver($config);
    }

    /**
     * Initialise the redis driver, with the configuration settings
     *
     * @param $config
     *
     * @return RedisDriver
     */
    public function createRedisDriver($config)
    {
        return new RedisDriver($config);
    }

    /**
     * Initialise the consul driver, with the configuration settings
     *
     * @param $config
     *
     * @return RedisDriver
     */
    public function createConsulDriver($config)
    {
        return new ConsulDriver($config);
    }

    /**
     * Initialise the specific driver
     *
     * @param array $config
     *
     * @return DriverInterface
     * 
     * @throws UnknownDriver
     */
    public function driver($config = array())
    {
        if (! isset($config['driver'])) {
            throw new UnknownDriver();
        }

        $type = strtolower($config['driver']);
        unset($config['driver']);

        $driver = "create" . ucfirst($type) . "Driver";
        if (method_exists($this, $driver)) {
            return $this->{$driver}($config);
        }

        throw new UnknownDriver($type);
    }
}