<?php

namespace Micronative\MockBroker;

interface PublisherInterface
{
    public function publish(string $message, string $topic);
}
