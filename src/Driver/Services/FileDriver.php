<?php

namespace DataSift\Feature\Driver\Services;

use Symfony\Component\OptionsResolver\OptionsResolver;

class FileDriver extends BaseDriver implements DriverInterface
{
    /**
     * @var array
     */
    protected $data;

    /**
     * Setup the ConsulDriver
     *
     * @param OptionsResolver $resolver
     *
     * @return void
     */
    protected function setupDriver(OptionsResolver $resolver)
    {
        $resolver->setRequired('file');
        $resolver->setAllowedValues('file', function ($file) {
            return file_exists($file) && is_readable($file);
        });
    }

    /**
     * Get data from file returns array
     *
     * @return array
     */
    public function getData()
    {
        if (is_null($this->data)) {
            $this->data = json_decode(file_get_contents($this->options['file']), true);
        }

        return $this->data;
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
