<?php

declare(strict_types=1);

namespace AlecRabbit\Color;

use AlecRabbit\Color\Contracts\ColorTable;
use AlecRabbit\Color\Exception\InvalidColorIndex;
use AlecRabbit\Traits\PrivateConstruct;

final class ColorFactory
{
    use PrivateConstruct;

    /**
     * @param int $r
     * @param int $g
     * @param int $b
     * @param int|null $a
     * @return RGBa
     */
    public static function fromRGBaValues(int $r, int $g, int $b, int $a = null): RGBa
    {
        return new RGBa($r, $g, $b, $a ?? 0xff);
    }

    /**
     * @param array | int | string $definition
     * @return RGBa
     */
    public static function createRGBaFromDefinition($definition): RGBa
    {
        self::assertDefinition($definition);
        if (is_int($definition)) {
            return self::fromConsole8bit($definition);
        }
        if (is_string($definition)) {
            return self::fromHexValue($definition);
        }
        // $definition is array
        return self::fromConsole4bit($definition[0]);
    }

    private static function assertDefinition($definition): void
    {
        // TODO
        // can be
        // [int] allowed colors
        // int 0..255
        // '#rrggbbaa'
    }

    /**
     * @param int $color
     * @return RGBa
     */
    public static function fromConsole8bit(int $color): RGBa
    {
        return new RGBa(...ColorTable::COLORS_8_TO_24[byte($color)]);
    }

    /**
     * @param int|string $hex
     * @return RGBa
     */
    public static function fromHexValue($hex): RGBa
    {
        return new RGBa(...Converter::hex2rgba($hex));
    }

    /**
     * @param int $color
     * @return RGBa
     */
    public static function fromConsole4bit(int $color): RGBa
    {
        self::assert4bitColor($color);
        return self::fromConsole8bit(ColorTable::COLORS_4_TO_8[$color]);
    }

    /**
     * @param int $color
     */
    private static function assert4bitColor(int $color): void
    {
        if (!array_key_exists($color, ColorTable::COLORS_4_TO_8)) {
            throw new InvalidColorIndex(
                sprintf(
                    Exception\Messages::VALUE_CAN_NOT_BE_ACCEPTED,
                    $color
                )
            );
        }
    }
}
