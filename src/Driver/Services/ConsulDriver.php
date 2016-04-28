<?php

namespace DataSift\Feature\Driver\Services;

use SensioLabs\Consul\ServiceFactory;
use SensioLabs\Consul\Services\KV;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConsulDriver extends BaseDriver implements DriverInterface
{
    /**
     * @var ServiceFactory
     */
    protected $consul;

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
            'host' => '127.0.0.1',
            'port' => 8500
        ));
    }

    /**
     * Get Consul key value pair instance
     *
     * @return KV
     */
    public function getConsul()
    {
        if (is_null($this->consul)) {
            $this->consul = new ServiceFactory(array(
                'base_url' => "http://{$this->options['host']}:{$this->options['port']}"
            ));
        }

        return $this->consul->get('kv');
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
            return (string) $this->getConsul()
                ->get($this->processKey($key), ['raw' => true])
                ->getBody();
        } catch (\Exception $ex) {
        }

        return $default;
    }

    /**
     * Transforms dot-notation key
     *
     * @param string $key
     *
     * @return string
     */
    protected function processKey($key)
    {
        return str_replace('.', '/', $key);
    }
}
