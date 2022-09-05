<?php

namespace Tests;

use Micronative\MockBroker\Broker;
use Micronative\MockBroker\Publisher;

class PublisherTest extends BaseTestCase
{
    private Publisher $publisher;
    private ?Broker $broker = null;

    protected function setUp(): void
    {
        parent::setUp();
        if (!$this->broker) {
            $this->broker = new Broker(__DIR__);
        }

        $this->publisher = new Publisher($this->broker);
    }

    public function testPublish()
    {
        $this->publisher->publish('hello', 'user.events');
        $this->assertIsArray($this->broker->getMessages());
    }
}
