<?php

namespace AlecRabbit\Tests\ConsoleColor;

use AlecRabbit\ConsoleColor\BasicClass;
use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{
    /** @test */
    public function dummy():void
    {
        $this->assertTrue(BasicClass::get());
        $this->assertFalse(BasicClass::get(5));
    }
}
