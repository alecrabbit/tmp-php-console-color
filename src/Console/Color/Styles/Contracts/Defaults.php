<?php

declare(strict_types=1);

namespace AlecRabbit\Console\Color\Styles\Contracts;

final class Defaults
{
    public const FG = 'FG';
    public const BG = 'BG';
    public const EF = 'EF';
    public const STYLES = [
        'red' => [
            self::FG => [],
            self::BG => [],
            self::EF => [],
        ],
    ];
}