<?php

declare(strict_types=1);

namespace AlecRabbit\Console\Color\Theme\Builder;

use AlecRabbit\Console\Color\Style\Style;
use AlecRabbit\Console\Color\Style\Styles;
use AlecRabbit\Console\Color\Theme\Theme;

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
