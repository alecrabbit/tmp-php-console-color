<?php

declare(strict_types=1);

namespace AlecRabbit\Console\Color\Style\Contracts;

final class Defaults
{
    public const FG = 'FG';
    public const BG = 'BG';
    public const EF = 'EF';

    public const STYLES = [
        'red' => [
            self::FG => '#ff0000', // Truecolor => '#rrggbb' // 8bitColor => int // 4bitColor => [int]
            self::BG => null,
            self::EF => null,
        ],
        'blue' => [
            self::FG => '#0000ff',
            self::BG => null,
            self::EF => null,
        ],
    ];
}
