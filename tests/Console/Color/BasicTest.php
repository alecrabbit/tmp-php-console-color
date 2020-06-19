<?php

namespace AlecRabbit\Tests\Console\Color;

use AlecRabbit\Console\Color\BasicClass;
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
