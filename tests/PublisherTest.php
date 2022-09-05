<?php

namespace Tests;

use Micronative\MockBroker\Broker;
use Micronative\MockBroker\Publisher;

class PublisherTest extends BaseTestCase
{
    private Publisher $publisher;
    private static ?Broker $broker = null;

    protected function setUp(): void
    {
        parent::setUp();
        if (!static::$broker) {
            static::$broker = new Broker(__DIR__);
        }

        $this->publisher = new Publisher(static::$broker);
    }

    public function testPublish()
    {
        $this->publisher->publish('hello', 'user.events');
        $this->assertIsArray(static::$broker->getMessages());
    }
}
