<?php

namespace Micronative\MockBroker;

interface ConsumerInterface
{
    public function consume(string $topic);
}
