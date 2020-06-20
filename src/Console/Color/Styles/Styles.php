<?php

declare(strict_types=1);

namespace AlecRabbit\Console\Color\Styles;

use AlecRabbit\Color\RGBa;
use AlecRabbit\Console\Color\Styles\Contracts\Defaults;

final class Styles
{
    protected $styles = [];

    public function __construct(array $styles = null)
    {
        $styles = $styles ?? Defaults::STYLES;
        foreach ($styles as $name => $style) {
            $foreground = new RGBa($style[Defaults::FG]);
            $background = new RGBa($style[Defaults::BG]);
            $effect = new Effect($style[Defaults::EF]);
            $this->setStyle($name, new Style($foreground, $background, $effect));
        }
    }

    public function setStyle(string $name, Style $style): self
    {
        $this->assertName($name);
        $this->styles[$name] = $style;
        return $this;
    }

    private function assertName(string $name): void
    {
        // TODO
    }

    /**
     * @return array<Style>
     */
    public function getStyles(): array
    {
        return $this->styles;
    }
}
