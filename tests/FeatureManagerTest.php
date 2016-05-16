<?php

namespace DataSift\Feature;

use PHPUnit_Framework_TestCase;
use \Mockery as m;

class FeatureManagerTest extends PHPUnit_Framework_TestCase
{
    /**
     * Tear down after tests
     */
    protected function tearDown()
    {
        m::close();
    }

    /** @test */
    public function it_is_initializable()
    {
        $featureManager = new FeatureManager(array(
            'driver' => 'array',
            'data' => array(
                'test' => true
            )
        ));
        $this->assertInstanceOf('DataSift\Feature\FeatureManager', $featureManager);
    }

    /** @test */
    public function it_should_call_is_enabled()
    {
        $featureManager = new FeatureManager(array(
            'driver' => 'array',
            'data' => array(
                'test' => true
            )
        ));

        $this->assertTrue($featureManager->isEnabled("test"));
        $this->assertFalse($featureManager->isEnabled("something"));
    }

    /**
     * DataProvider for falsey values
     *
     * @return array
     */
    public function falseyProvider()
    {
        return array(
            array('false'),
            array('')
        );
    }

    /**
     * @dataProvider falseyProvider
     *
     * @param string $value
     *
     * @test
     */
    public function it_should_handle_falsey_values($value)
    {
        $featureManager = new FeatureManager(array(
            'driver' => 'array',
            'data' => array(
                'value' => $value
            )
        ));

        $this->assertFalse($featureManager->isEnabled('value'));
        $this->assertTrue($featureManager->isNotEnabled('value'));
    }
}
