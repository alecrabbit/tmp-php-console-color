<?php

declare(strict_types=1);

namespace AlecRabbit\Color\Contracts;

interface ColorInterface
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
     * @param bool $withAlfa
     * @return string Hex color representation
     */
    public function hex(bool $withAlfa = true): string;
}
