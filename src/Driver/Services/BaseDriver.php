<?php

namespace DataSift\Feature\Driver\Services;

use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class BaseDriver
{
    /**
     * @var array
     */
    protected $options;

    /**
     * BaseDriver constructor.
     *
     * @param array $options
     */
    public function __construct(array $options = array())
    {
        $resolver = new OptionsResolver();
        $this->setupDriver($resolver);

        $this->options = $resolver->resolve($options);
    }

    /**
     * Setup the Driver
     *
     * @param OptionsResolver $resolver
     *
     * @return void
     */
    abstract protected function setupDriver(OptionsResolver $resolver);

    /**
     * Returns an item from config
     *
     * @param string $key
     *
     * @return bool|mixed
     */
    public function config($key)
    {
        return isset($this->options[$key]) ? $this->options[$key] : false;
    }
}
