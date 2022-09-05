<?php

namespace Tests;

use Micronative\MockBroker\Broker;

class BrokerTest extends BaseTestCase
{
    private static ?Broker $broker = null;

    protected function setUp(): void
    {
        parent::setUp();
        if (!static::$broker) {
            static::$broker = new Broker(__DIR__);
        }
    }

    public function testSettersAndGetters()
    {
        static::$broker->setMessages([]);
        $this->assertEquals([], static::$broker->getMessages());
    }

    public function testPush()
    {
        static::$broker->push('hello', 'user.events');
        $this->assertIsArray(static::$broker->getMessages());
    }

    public function testPull()
    {
        $message = static::$broker->pull('user.events');
        $this->assertEquals('hello', $message);
    }
}
