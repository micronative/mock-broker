<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: samples/Protobuf/User.proto

namespace Protobuf\Metadata;

class User
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
v
samples/Protobuf/User.protoProtobuf.Messages"#
User
name (	
email (	B??Protobuf/Metadatabproto3'
        , true);

        static::$is_initialized = true;
    }
}

