<?php

namespace Nord\Lumen\Doctrine\Tests;


class HelloWorldTest extends \PHPUnit_Framework_TestCase
{
    public function testGreeting() {
        $greeting = "Hello World";
        $requiredGreeting = "Hello World";
        $this->assertEquals($greeting, $requiredGreeting);
    }
}
