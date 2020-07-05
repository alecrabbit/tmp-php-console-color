<?php

declare(strict_types=1);

namespace AlecRabbit\Console\Color\Style;

use AlecRabbit\Color\RGBa;

final class Style
{
    /**
     * @var RGBa|null
     */
    private $fg;
    /**
     * @var RGBa|null
     */
    private $bg;
    /**
     * @var Effect|null
     */
    private $effect;
    /**
     * @var string
     */
    private $name;

    public function __construct(RGBa $fg = null, RGBa $bg = null, Effect $effect = null, string $name = '')
    {
        $this->fg = $fg;
        $this->bg = $bg;
        $this->effect = $effect;
        $this->name = $name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}
