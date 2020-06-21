<?php

declare(strict_types=1);

namespace AlecRabbit\Color;

if (!function_exists('byte')) {
    /**
     * @param int $value
     * @return int Clipped to 0x00..0xFF
     */
    function byte(int $value): int
    {
        if (0x00 > $value) {
            return 0x00;
        }
        if (0xff < $value) {
            return 0xff;
        }
        return $value;
    }
}

if (!function_exists('hex')) {
    /**
     * @param int $number
     * @return string
     */
    function hex(int $number): string
    {
        return
            str_pad(dechex($number), 2, '0', STR_PAD_LEFT);
    }
}
