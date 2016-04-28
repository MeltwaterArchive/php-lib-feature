<?php

namespace spec\DataSift\Feature;

use DataSift\Feature\Driver\Services\DriverInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FeatureManagerSpec extends ObjectBehavior
{
    function it_is_initializable(DriverInterface $driver)
    {
        $this->beConstructedWith($driver);
        $this->shouldHaveType('DataSift\Feature\FeatureManager');
    }

    function it_should_call_is_enabled(DriverInterface $driver)
    {
        $this->beConstructedWith($driver);
        $driver->get("value", false)->shouldBeCalled();
        $this->isEnabled("value");
    }

    function it_should_handle_falsey_values(DriverInterface $driver)
    {
        $this->beConstructedWith($driver);
        $driver->get("value", false)->shouldBeCalled()->WillReturn('false');
        $this->isEnabled("value")->shouldReturn(false);

        $driver->get("value", false)->shouldBeCalled()->WillReturn('');
        $this->isEnabled("value")->shouldReturn(false);
    }
}
