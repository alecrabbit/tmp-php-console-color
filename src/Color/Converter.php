<?php

declare(strict_types=1);

namespace AlecRabbit\Color;

use AlecRabbit\Color\Exceptions\InvalidArgumentException;
use AlecRabbit\Color\Exceptions\Messages;
use AlecRabbit\Traits\PrivateConstruct;

final class Converter
{
    use PrivateConstruct;

    public static function rgba2hex(int $r, int $g, int $b, ?int $a = null): string
    {
        $hex = '';
        $c = [$r, $g, $b, $a ?? 0xff];
        foreach ($c as $value) {
            $hex .= hex(byte($value));
        }
        return $hex;
    }

    /**
     * @param int|string $hex
     * @return array<int>
     */
    public static function hex2rgba($hex): array
    {
        $hex = self::normalizeHex($hex);
        /** @noinspection PrintfScanfArgumentsInspection */
        return sscanf($hex, '#%02x%02x%02x%02x');
    }

    /**
     * @param int|string $hex
     * @return string
     */
    public static function normalizeHex($hex): string
    {
        $hex = self::int2hex($hex);
        $hex = ltrim(rtrim(ltrim($hex)), '#');
        if (8 < \strlen($hex)) {
            $hex = substr($hex, 0, 8);
        }
        HexValidator::assertHex($hex);
        if (6 === \strlen($hex)) {
            $hex .= 'ff';
        }
        if (3 === \strlen($hex)) {
            $hex .= 'f';
        }
        if (4 === \strlen($hex)) {
            $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2] . $hex[3] . $hex[3];
        }
        return '#' . $hex;
    }

    /**
     * @param int|string $hex
     * @return string
     */
    private static function int2hex($hex): string
    {
        if (\is_int($hex)) {
            return dechex((int)(string)$hex);
        }
        if (!\is_string($hex)) {
            throw new InvalidArgumentException(
                sprintf(
                    Messages::ARGUMENT_EXPECTED_TO_BE_INT_STRING_GIVEN,
                    \gettype($hex)
                )
            );
        }
        return $hex;
    }
}
