<?php

declare(strict_types=1);

namespace AlecRabbit\Color;

use AlecRabbit\Color\Contracts\ColorInterface;

class Color implements ColorInterface
{
    /**
     * @var int
     */
    private $r;
    /**
     * @var int
     */
    private $g;
    /**
     * @var int
     */
    private $b;
    /**
     * @var int|null
     */
    private $a;

    /**
     * Color constructor.
     * @param int $r
     * @param int $g
     * @param int $b
     * @param int $a
     */
    public function __construct(int $r, int $g, int $b, int $a = null)
    {
        $a = $a ?? 0xff;
        $this->r = byte($r);
        $this->g = byte($g);
        $this->b = byte($b);
        $this->a = byte($a);
    }

    public function red(): int
    {
        return $this->r;
    }

    public function green(): int
    {
        return $this->g;
    }

    public function blue(): int
    {
        return $this->b;
    }

    public function alfa(): int
    {
        return $this->a;
    }
}
