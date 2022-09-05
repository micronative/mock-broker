<?php

namespace Tests;

use Micronative\MockBroker\Broker;

class BrokerTest extends BaseTestCase
{
    private ?Broker $broker = null;

    protected function setUp(): void
    {
        parent::setUp();
        if (!$this->broker) {
            $this->broker = new Broker(__DIR__);
        }
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->broker);
    }

    public function testSettersAndGetters()
    {
        $this->broker->setMessages([]);
        $this->assertEquals([], $this->broker->getMessages());
    }

    public function testPush()
    {
        $this->broker->push('hello', 'user.events');
        $this->assertIsArray($this->broker->getMessages());
    }

    public function testPull()
    {
        $message = $this->broker->pull('user.events');
        $this->assertEquals('hello', $message);
    }

    public function testPullReturnNull()
    {
        $message = $this->broker->pull('none.existing.topic');
        $this->assertNull($message);
    }
}
