<?php

namespace Nord\Lumen\Doctrine\Tests;


class HelloWorldTest extends \PHPUnit\Framework\TestCase
{
    public function testGreeting() {
        $greeting = "Hello World";
        $requiredGreeting = "Hello World";
        $this->assertEquals($greeting, $requiredGreeting);
    }
}
