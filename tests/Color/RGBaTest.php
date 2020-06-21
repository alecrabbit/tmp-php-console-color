<?php

declare(strict_types=1);

namespace AlecRabbit\Tests\Color;

use AlecRabbit\Color\RGBa;
use PHPUnit\Framework\TestCase;

class RGBaTest extends TestCase
{
    /** @test */
    public function createInstance(): void
    {
        $r = 56;
        $g = 223;
        $b = 174;
        $a = 88;
        $c = new RGBa($r, $g, $b);
        $this->assertInstanceOf(RGBa::class, $c);
        $c = new RGBa($r, $g, $b, $a);
        $this->assertInstanceOf(RGBa::class, $c);
    }

    /**
     * @test
     * @dataProvider  createInstanceWithValuesDataProvider
     * @param array $values
     * @param array $expected
     */
    public function createInstanceWithValues(array $values, array $expected): void
    {
        [$r, $g, $b, $a] = $values;

        if (null === $a) {
            $c = new RGBa($r, $g, $b);
        } else {
            $c = new RGBa($r, $g, $b, $a);
        }
        $this->assertRGBa($expected, $c);
    }

    protected function assertRGBa(array $expected, RGBa $c): void
    {
        [$r, $g, $b, $a, $hexa, $hex] = $expected;

        $this->assertSame($r, $c->red());
        $this->assertSame($g, $c->green());
        $this->assertSame($b, $c->blue());
        $this->assertSame($a, $c->alfa());
        $this->assertSame($hexa, $c->hex());
        $this->assertSame($hex, $c->hex(false));
    }

    public function createInstanceWithValuesDataProvider(): array
    {
        return [
            [[0x12, 0xfa, 0xee, null], [0x12, 0xfa, 0xee, 0xff, '#12faeeff', '#12faee'],],
            [[0x12, 0xfa, 0xee, 0x88], [0x12, 0xfa, 0xee, 0x88, '#12faee88', '#12faee'],],
            [[0x00, 0x00, 0x00, 0x00], [0x00, 0x00, 0x00, 0x00, '#00000000', '#000000'],],
            [[0xfff, 0xff, 0xff, -12], [0xff, 0xff, 0xff, 0, '#ffffff00', '#ffffff'],],
            [[-0xfff, 0xff, 0xff, -12], [0x00, 0xff, 0xff, 0, '#00ffff00', '#00ffff'],],
        ];
    }
}
