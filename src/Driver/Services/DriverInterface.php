<?php

namespace DataSift\Feature\Driver\Services;

interface DriverInterface
{
    /**
     * Lookup the value for a given key
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get($key, $default = false);
}
