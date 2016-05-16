<?php

namespace DataSift\Feature\Driver\Services;

use Predis\Client;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RedisDriver extends BaseDriver implements DriverInterface
{
    /**
     * @var Client
     */
    protected $redis;

    /**
     * Setup the ConsulDriver
     *
     * @param OptionsResolver $resolver
     *
     * @return void
     */
    protected function setupDriver(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'scheme' => 'tcp',
            'host' => '127.0.0.1',
            'port' => 6379
        ));
    }

    /**
     * Get Redis client instance
     *
     * @return Client
     */
    public function getRedis()
    {
        if (is_null($this->redis)) {
            $this->redis = new Client([
                'scheme' => $this->options['scheme'],
                'host'   => $this->options['host'],
                'port'   => $this->options['port'],
            ]);
        }

        return $this->redis;
    }

    /**
     * Lookup the value for a given key
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get($key, $default = false)
    {
        try {
            return (string) $this->getRedis()->get($key);
        } catch (\Exception $ex) {
        }

        return $default;
    }
}
