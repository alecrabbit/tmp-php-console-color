<?php

declare(strict_types=1);

namespace AlecRabbit\Console\Color\Theme\Contracts;

use AlecRabbit\Console\Color\Style\Style;
use AlecRabbit\Console\Color\Style\Styles;

/**
 * @method debug(string $text)
 * @method comment(string $text)
 * @method info(string $text)
 * @method error(string $text)
 * @method warning(string $text)
 * @method yellow(string $text)
 * @method green(string $text)
 * @method red(string $text)
 * @method cyan(string $text)
 * @method magenta(string $text)
 * @method black(string $text)
 * @method blue(string $text)
 * @method lightGray(string $text)
 * @method darkGray(string $text)
 * @method lightRed(string $text)
 * @method lightGreen(string $text)
 * @method lightYellow(string $text)
 * @method lightBlue(string $text)
 * @method lightMagenta(string $text)
 * @method lightCyan(string $text)
 * @method white(string $text)
 * @method italic(string $text)
 * @method bold(string $text)
 * @method dark(string $text)
 * @method crossed(string $text)
 * @method darkItalic(string $text)
 * @method whiteBold(string $text)
 * @method underlined(string $text)
 * @method underlinedBold(string $text)
 * @method underlinedItalic(string $text)
 */
abstract class DefaultTheme
{
    protected $styles = [];

    public function __construct(Styles $styles)
    {
        foreach ($styles->getStyles() as $style) {
            $name = $style->getName();
            $this->styles[$name] = $style;
        }
    }

    public function __call(string $name, array $arguments): string
    {
        $this->assertMethodName($name);
        $this->assertArgs($name, $arguments);
        return $this->apply($this->styles[$name], $arguments[0]);
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
        if (1 !== \count($arguments)) {
            throw new \ArgumentCountError(
                'Method [' . static::class . '::' . $name . '] accepts only one argument.'
            );
        }
        if (!\is_string($arguments[0])) {
            throw new \InvalidArgumentException(
                'Argument 1 for [' . static::class . '::' . $name . '] should be a "string", "'
                . \gettype($arguments[0]) . '" provided.'
            );
        }
    }

    private function apply(Style $style, string $text): string
    {
        return $text;
    }
}
