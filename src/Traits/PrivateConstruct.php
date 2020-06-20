<?php

declare(strict_types=1);

namespace AlecRabbit\Traits;

trait PrivateConstruct
{
    /** Class can not be instantiated */
    private function __construct()
    {
    }
}