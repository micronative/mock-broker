<?php

namespace Tests;

use Micronative\MockBroker\Broker;
use Micronative\MockBroker\Consumer;

class ConsumerTest extends BaseTestCase
{
    private Consumer $consumer;
    private ?Broker $broker = null;

    protected function setUp(): void
    {
        parent::setUp();
        if (!$this->broker) {
            $this->broker = new Broker(__DIR__);
            $this->broker->setMessages(['user.events' => ['hello']]);
        }

        $this->consumer = new Consumer($this->broker);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->broker);
    }

    public function testConsume()
    {
        $message = $this->consumer->consume('user.events');
        $this->assertEquals('hello', $message);
        $this->assertIsArray($this->broker->getMessages());
    }
}
