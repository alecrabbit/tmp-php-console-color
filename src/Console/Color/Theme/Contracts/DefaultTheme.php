<?php

declare(strict_types=1);

namespace AlecRabbit\Console\Color\Theme\Contracts;

use AlecRabbit\Console\Color\Color;
use AlecRabbit\Console\Color\Style\Style;
use AlecRabbit\Console\Color\Style\Styles;

use const AlecRabbit\NO_COLOR_TERMINAL;

/**
 * @method debug(string $text, ?int $colorLevel = null)
 * @method comment(string $text, ?int $colorLevel = null)
 * @method info(string $text, ?int $colorLevel = null)
 * @method error(string $text, ?int $colorLevel = null)
 * @method warning(string $text, ?int $colorLevel = null)
 * @method yellow(string $text, ?int $colorLevel = null)
 * @method green(string $text, ?int $colorLevel = null)
 * @method red(string $text, ?int $colorLevel = null)
 * @method cyan(string $text, ?int $colorLevel = null)
 * @method magenta(string $text, ?int $colorLevel = null)
 * @method black(string $text, ?int $colorLevel = null)
 * @method blue(string $text, ?int $colorLevel = null)
 * @method lightGray(string $text, ?int $colorLevel = null)
 * @method darkGray(string $text, ?int $colorLevel = null)
 * @method lightRed(string $text, ?int $colorLevel = null)
 * @method lightGreen(string $text, ?int $colorLevel = null)
 * @method lightYellow(string $text, ?int $colorLevel = null)
 * @method lightBlue(string $text, ?int $colorLevel = null)
 * @method lightMagenta(string $text, ?int $colorLevel = null)
 * @method lightCyan(string $text, ?int $colorLevel = null)
 * @method white(string $text, ?int $colorLevel = null)
 * @method italic(string $text, ?int $colorLevel = null)
 * @method bold(string $text, ?int $colorLevel = null)
 * @method dark(string $text, ?int $colorLevel = null)
 * @method crossed(string $text, ?int $colorLevel = null)
 * @method darkItalic(string $text, ?int $colorLevel = null)
 * @method whiteBold(string $text, ?int $colorLevel = null)
 * @method underlined(string $text, ?int $colorLevel = null)
 * @method underlinedBold(string $text, ?int $colorLevel = null)
 * @method underlinedItalic(string $text, ?int $colorLevel = null)
 */
abstract class DefaultTheme
{
    /** @var array */
    protected $styles = [];
    /** @var Color */
    protected $color;
    /** @var int */
    protected $colorLevel;

    public function __construct(Styles $styles, Color $color = null)
    {
        foreach ($styles->getStyles() as $style) {
            $name = $style->getName();
            $this->styles[$name] = $style;
        }
        $this->color = $color ?? new Color();
        $this->colorLevel = $this->color->getColorLevel();
    }

    public function __call(string $name, array $arguments): string
    {
        $this->assertMethodName($name);
        $this->assertArgs($name, $arguments);
        $colorLevel = $arguments[1] ?? null;
        $text = $arguments[0];
        return $this->apply($name, $text, $colorLevel);
    }

    /**
     * @param string $name
     */
    protected function assertMethodName(string $name): void
    {
        if (!\array_key_exists($name, $this->styles)) {
            throw new \BadMethodCallException('Call of unknown method [' . static::class . '::' . $name . '].');
        }
    }

    /**
     * @param string $name
     * @param array $arguments
     */
    protected function assertArgs(string $name, array $arguments): void
    {
        $count = \count($arguments);
        if (1 > $count || $count > 2) {
            throw new \ArgumentCountError(
                sprintf(
                    'Method [%s::%s] accepts 1 or 2 arguments, %s provided.',
                    static::class,
                    $name,
                    $count
                )
            );
        }
        if (!\is_string($arguments[0])) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Argument 1 for [%s::%s] should be a "string", "%s" provided.',
                    static::class,
                    $name,
                    \gettype($arguments[0])
                )
            );
        }
        if (!\is_int($arguments[1] ?? 0)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Argument 2 for [%s::%s] should be an "int", "%s" provided.',
                    static::class,
                    $name,
                    \gettype($arguments[1])
                )
            );
        }
    }

    private function apply(string $styleName, string $text, ?int $colorLevel = null): string
    {
        return $text;
    }
}
