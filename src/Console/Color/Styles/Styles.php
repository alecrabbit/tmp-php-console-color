<?php

declare(strict_types=1);

namespace AlecRabbit\Console\Color\Styles;

use AlecRabbit\Console\Color\Styles\Contracts\Defaults;

final class Styles
{
    protected $styles = [];

    public function __construct(array $styles = null)
    {
        $styles = $styles ?? Defaults::STYLES;
        foreach ($styles as $name => $style) {
            $foreground = new Color($style[Defaults::FG]);
            $background = new Color($style[Defaults::BG]);
            $effect = new Effect($style[Defaults::EF]);
            $this->set($name, new Style($foreground, $background, $effect));
        }
    }
    
    public function set(string $name, Style $style): self
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