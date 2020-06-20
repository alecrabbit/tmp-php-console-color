<?php

declare(strict_types=1);

namespace AlecRabbit\Color;

use AlecRabbit\Color\Contracts\ColorTables;
use AlecRabbit\Color\Exceptions\InvalidColorIndex;
use AlecRabbit\Traits\PrivateConstruct;

final class Factory
{
    use PrivateConstruct;

    /**
     * @param int $color
     * @return RGBa
     */
    public static function fromConsole4bit(int $color): RGBa
    {
        self::assert4bitColor($color);
        return self::fromConsole8bit(ColorTables::COLORS_4_TO_8[$color]);
    }

    /**
     * @param int $color
     * @return RGBa
     */
    public static function fromConsole8bit(int $color): RGBa
    {
        return new RGBa(...ColorTables::COLORS_8_TO_24[byte($color)]);
    }

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
     * @param int|string $hex
     * @return RGBa
     */
    public static function fromHexValue($hex): RGBa
    {
        return new RGBa(...Converter::hex2rgba($hex));
    }

    /**
     * @param int $color
     */
    private static function assert4bitColor(int $color): void
    {
        if (!array_key_exists($color, ColorTables::COLORS_4_TO_8)) {
            throw new InvalidColorIndex(
                sprintf(
                    Exceptions\Messages::VALUE_CAN_NOT_BE_ACCEPTED,
                    $color
                )
            );
        }
    }
}