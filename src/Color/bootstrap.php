<?php

declare(strict_types=1);

namespace AlecRabbit\Color;

if (!function_exists('byte')) {
    function byte(int $b): int
    {
        if (0 > $b) {
            return 0;
        }
        if (255 < $b) {
            return 255;
        }
        return $b;
    }
}
