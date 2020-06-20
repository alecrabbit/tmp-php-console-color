<?php

declare(strict_types=1);

namespace AlecRabbit\Console\Color\Themes;

use AlecRabbit\Console\Color\Styles\Styles;

final class Themes
{
    private const DEFAULT_THEME = 'default';
    private static $themes;

    private function __construct()
    {
    }

    public static function get(?string $themeName): Theme
    {
        self::initialize();
        $themeName = $themeName ?? self::DEFAULT_THEME;
        if (array_key_exists($themeName, self::$themes)) {
            return self::$themes[$themeName];
        }
        return self::$themes[self::DEFAULT_THEME];
    }

    private static function initialize(): void
    {
        if (null === self::$themes) {
            self::$themes =
                [
                    self::DEFAULT_THEME => new Theme(new Styles())
                ];
        }
    }

    public static function add(string $name, Theme $theme): void
    {
        self::initialize();
        if (self::has($name)) {
            throw new \InvalidArgumentException('Theme already has been added.');
        }
        self::setTheme($name, $theme);
    }

    public static function replace(string $name, Theme $theme): void
    {
        self::initialize();
        if (!self::has($name)) {
            throw new \RuntimeException('Nothing to replace.');
        }
        self::setTheme($name, $theme);
    }

    public static function has(string $name): bool
    {
        return array_key_exists($name, self::$themes);
    }

    private static function setTheme(string $name, Theme $theme): void
    {
        self::$themes[$name] = $theme;
    }
}
