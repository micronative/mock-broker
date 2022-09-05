<?php

namespace Micronative\MockBroker;

class Publisher implements PublisherInterface
{
    protected Broker $broker;

    /**
     * Publisher constructor.
     * @param \Micronative\MockBroker\Broker $broker
     */
    public function __construct(Broker $broker)
    {
        $this->broker = $broker;
    }

    /**
     * @param string $message
     * @param string $topic
     * @return bool
     */
    public function publish(string $message, string $topic)
    {
        return $this->broker->push($message, $topic);
    }
}
