<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Domain\ValueObject;

use NicolasLefevre\FizzBuzz\Domain\Error\NumberMustBePositiveError;

readonly class PositiveNumber
{
    public int $value;

    public function __construct(int $value)
    {
        $this->validate($value);

        $this->value = $value;
    }

    private function validate(int $value): void
    {
        if ($value <= 0) {
            throw new NumberMustBePositiveError();
        }
    }
}
