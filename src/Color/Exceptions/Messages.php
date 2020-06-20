<?php

declare(strict_types=1);

namespace AlecRabbit\Color\Exceptions;

final class Messages
{
    public const DOES_NOT_MATCH_EXPECTED_FORMATS = '[%s] does not match one of the expected hex formats [\'%s\']';
    public const ARGUMENT_EXPECTED_TO_BE_INT_STRING_GIVEN = 'Argument 1 expected to be int|string, %s given';
    public const VALUE_CAN_NOT_BE_ACCEPTED = 'Value [%s] can not be accepted as 4bit color' ;
}