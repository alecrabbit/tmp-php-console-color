<?php

declare(strict_types=1);

namespace AlecRabbit\Color;

use AlecRabbit\Color\Contracts\RGBaInterface;

final class RGBa implements RGBaInterface
{
    private const HEX_FORMAT = '#%s%s%s%s'; // #rrggbbaa
    private const RGB_FORMAT = 'rgb(%u, %u, %u)'; // rgb(0..255, 0..255, 0..255)
    private const RGBA_FORMAT = 'rgba(%u, %u, %u, %.3f)'; // rgb(0..255, 0..255, 0..255, 0..1)

    /** @var int */
    private $r;
    /** @var int */
    private $g;
    /** @var int */
    private $b;
    /** @var int */
    private $a;

    /**
     * @param int $r
     * @param int $g
     * @param int $b
     * @param int $a
     */
    public function __construct(int $r, int $g, int $b, int $a = null)
    {
        $this->r = byte($r);
        $this->g = byte($g);
        $this->b = byte($b);
        $this->a = byte($a ?? 0xff);
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
    public function hex(bool $withAlfa = false): string
    {
        return
            sprintf(
                self::HEX_FORMAT,
                hex($this->r),
                hex($this->g),
                hex($this->b),
                $withAlfa ? hex($this->a) : '',
            );
    }

    /** @inheritDoc */
    public function rgb(): string
    {
        return
            sprintf(
                self::RGB_FORMAT,
                $this->r,
                $this->g,
                $this->b,
            );
    }

    /** @inheritDoc */
    public function rgba(): string
    {
        return
            sprintf(
                self::RGBA_FORMAT,
                $this->r,
                $this->g,
                $this->b,
                $this->a / 255,
            );
    }

    public function setAlfa(float $a): RGBaInterface
    {
        if (0 > $a) {
            $a = 0.0;
        }
        if (1 < $a) {
            $a = 1.0;
        }
        $c = clone $this;
        $c->a = (int)$a * 255;
        return $c;
    }
}
