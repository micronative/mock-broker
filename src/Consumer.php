<?php

namespace Micronative\MockBroker;

class Consumer implements ConsumerInterface
{
    protected Broker $broker;

    /**
     * Consumer constructor.
     * @param \Micronative\MockBroker\Broker $broker
     */
    public function __construct(Broker $broker)
    {
        $this->broker = $broker;
    }

    /**
     * @param string $topic
     * @return null|string
     */
    public function consume(string $topic)
    {
        return $this->broker->pull($topic);
    }
}
