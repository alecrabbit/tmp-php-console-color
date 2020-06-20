<?php

declare(strict_types=1);

namespace AlecRabbit\Color;

use AlecRabbit\Color\Contracts\ColorInterface;

final class RGBa implements ColorInterface
{
    private const FORMAT = '#%s%s%s%s';

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

    /** @inheritDoc */
    public function red(): int
    {
        return $this->r;
    }

    /** @inheritDoc */
    public function green(): int
    {
        return $this->g;
    }

    /** @inheritDoc */
    public function blue(): int
    {
        return $this->b;
    }

    /** @inheritDoc */
    public function alfa(): int
    {
        return $this->a;
    }

    /** @inheritDoc */
    public function hex(bool $withAlfa = true): string
    {
        return
            sprintf(
                self::FORMAT,
                hex($this->r),
                hex($this->g),
                hex($this->b),
                $withAlfa ? hex($this->a) : '',
            );
    }
}
