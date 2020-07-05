<?php

declare(strict_types=1);

namespace AlecRabbit\Console\Color;

use const AlecRabbit\NO_COLOR_TERMINAL;

final class Color
{
    /**
     * @var int
     */
    private $colorLevel;

    /**
     * Color constructor.
     * @param int $colorLevel
     */
    public function __construct(int $colorLevel = NO_COLOR_TERMINAL)
    {
        $this->colorLevel = $colorLevel;
    }

    /**
     * @return int
     */
    public function getColorLevel(): int
    {
        return $this->colorLevel;
    }

}