<?php

declare(strict_types=1);

namespace AlecRabbit\Color;

use AlecRabbit\Color\Exception\InvalidArgumentException;
use AlecRabbit\Color\Exception\Messages;

final class HexValidator
{
    public const EXPECTED_FORMATS = ['#rgb', '#rgba', '#rrggbb', '#rrggbbaa',];
    public const REGEXP = "/^((?:[\da-f]{3}){1,2}|(?:[\da-f]{4}){1,2})$/i";

    public static function assertHex(string $hex): void
    {
        if (!(bool)preg_match(self::REGEXP, $hex)) {
            throw new InvalidArgumentException(
                sprintf(
                    Messages::DOES_NOT_MATCH_EXPECTED_FORMATS,
                    $hex,
                    implode('\', \'', self::EXPECTED_FORMATS)
                )
            );
        }
    }
}
