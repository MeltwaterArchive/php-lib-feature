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

//    /**
//     * Create/Update the value for a given key
//     *
//     * @param string $key
//     * @param string $value
//     *
//     * @return void
//     */
//    public function put($key, $value);
//
//    /**
//     * Delete the value for a given key
//     *
//     * @param string $key
//     *
//     * @return mixed
//     */
//    public function delete($key);
}
