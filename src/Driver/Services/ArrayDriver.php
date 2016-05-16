<?php

namespace DataSift\Feature\Driver\Services;

use Symfony\Component\OptionsResolver\OptionsResolver;

class ArrayDriver extends BaseDriver implements DriverInterface
{
    /**
     * @var array
     */
    protected $data;

    /**
     * NoOp
     *
     * @param OptionsResolver $resolver
     */
    protected function setupDriver(OptionsResolver $resolver)
    {
        $resolver->setRequired('data');
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        return $this->options['data'];
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
        $current = $this->getData();
        $p = strtok($key, '.');

        while ($p !== false) {
            if (! isset($current[$p])) {
                return $default;
            }
            $current = $current[$p];
            $p = strtok('.');
        }

        return ! is_array($current) ? $current : $default;
    }
}
