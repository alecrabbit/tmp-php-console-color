<?php

declare(strict_types=1);

namespace AlecRabbit\Color;

if (!function_exists('byte')) {
    /**
     * @param int $b
     * @return int Clipped to 0x00..0xFF
     */
    function byte(int $b): int
    {
        if (0x00 > $b) {
            return 0x00;
        }
        if (0xff < $b) {
            return 0xff;
        }
        return $b;
    }
}

if (!function_exists('hex')) {
    /**
     * @param int $b
     * @return string
     */
    function hex(int $b): string
    {
        return
            str_pad(dechex($b), 2, '0', STR_PAD_LEFT);
    }
}
