<?php

declare(strict_types=1);

namespace AlecRabbit\Color\Contracts;

interface RGBaInterface
{
    /**
     * @return int 0..255
     */
    public function red(): int;

    /**
     * @return int 0..255
     */
    public function green(): int;

    /**
     * @return int 0..255
     */
    public function blue(): int;

    /**
     * @return int 0..255
     */
    public function alfa(): int;

    /**
     * Hex color representation '#rrggbb[aa]'
     * @param bool $withAlfa
     * @return string
     */
    public function hex(bool $withAlfa = false): string;

    /**
     * RGB color representation 'rgb(0..255, 0..255, 0..255)'
     * @return string
     */
    public function rgb(): string;

    /**
     * RGBa color representation 'rgba(0..255, 0..255, 0..255, 0..1)'
     * @return string
     */
    public function rgba(): string;

    /**
     * @param float $a
     * @return $this
     */
    public function setAlfa(float $a): self;
}
