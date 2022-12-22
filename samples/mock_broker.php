<?php
require_once('./vendor/autoload.php');

use Micronative\MockBroker\Broker;
use Protobuf\Messages\User;
const TOPIC = 'UserCreated';

try {
    $broker = new Broker(dirname(__FILE__) . '/Broker/storage');
    $publisher = new \Micronative\MockBroker\Publisher($broker);
    $user = new \Protobuf\Messages\User();
    $user
        ->setName('Ken Ngo')
        ->setEmail('kenngo@micronative.com');
    $publisher->publish($user->serializeToJsonString(), TOPIC);

    $consumer = new \Micronative\MockBroker\Consumer($broker);
    $message = $consumer->consume(TOPIC);
    $newUser = new User();
    $newUser->mergeFromJsonString($message);
} catch (Exception $e) {
    echo $e->getMessage();
}
