<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Domain\ValueObject;

use NicolasLefevre\FizzBuzz\Domain\Error\NumberMustBePositiveError;

final class NumberValidator
{
    public static function validate(int $value)
    {
        if ($value <= 0) {
            throw new NumberMustBePositiveError();
        }
    }
}
