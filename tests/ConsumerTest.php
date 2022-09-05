<?php

namespace Tests;

use Micronative\MockBroker\Broker;
use Micronative\MockBroker\Consumer;

class ConsumerTest extends BaseTestCase
{
    private Consumer $consumer;
    private static ?Broker $broker = null;

    protected function setUp(): void
    {
        parent::setUp();
        if (!static::$broker) {
            static::$broker = new Broker(__DIR__);
            static::$broker->setMessages(['user.events' => ['hello']]);
        }

        $this->consumer = new Consumer(static::$broker);
    }

    public function testConsume()
    {
        $message = $this->consumer->consume('user.events');
        $this->assertEquals('hello', $message);
        $this->assertIsArray(static::$broker->getMessages());
    }
}
