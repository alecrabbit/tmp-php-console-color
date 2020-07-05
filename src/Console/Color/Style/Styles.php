<?php

declare(strict_types=1);

namespace AlecRabbit\Console\Color\Style;

use AlecRabbit\Color\ColorFactory;
use AlecRabbit\Color\RGBa;
use AlecRabbit\Console\Color\Style\Contracts\Defaults;

final class Styles
{
    /**
     * @var Style[]
     */
    private $styles = [];

    /**
     * Styles constructor.
     * @param Style[] $styles
     */
    public function __construct(array $styles)
    {
        $this->initialize($styles);
    }

    /**
     * @param Style[] $styles
     */
    private function initialize(array $styles): void
    {
        foreach ($styles as $style) {
            $this->setStyle($style);
        }
    }

    public function setStyle(Style $style): self
    {
        $name = $style->getName();
        $this->assertName($name);
        $this->styles[$name] = $style;
        return $this;
    }

    private function assertName(string $name): void
    {
        // TODO
        // name should NOT be empty
        // name should be unique for this instance
    }

    /**
     * @return Style[]
     */
    public function getStyles(): array
    {
        return $this->styles;
    }
}
