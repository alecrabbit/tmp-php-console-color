<?php

declare(strict_types=1);

namespace AlecRabbit\Console\Color\Themes\Builder;

use AlecRabbit\Console\Color\Styles\Style;
use AlecRabbit\Console\Color\Styles\Styles;
use AlecRabbit\Console\Color\Themes\Theme;

final class ThemeBuilder
{
    /** @var Styles */
    protected $styles;

    public function __construct(Styles $styles = null)
    {
        $this->styles = $styles ?? new Styles();
    }


    public function addStyle(string $name, Style $style): self
    {
        $this->styles->setStyle($name, $style);
        return $this;
    }

    public function buildTheme(): Theme
    {
        return new Theme($this->styles);
    }
}
