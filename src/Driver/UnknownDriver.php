<?php

namespace DataSift\Feature\Driver;

class UnknownDriver extends \RuntimeException
{
    /**
     * UnknownDriver constructor.
     *
     * @param string|bool $type
     */
    public function __construct($type = false)
    {
        parent::__construct("Unknown driver" . ($type ? " [{$type}]" : ""));
    }
}
