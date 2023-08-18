<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Domain\ValueObject;

use NicolasLefevre\FizzBuzz\Domain\Error\NumberMustBePositiveError;

final readonly class From
{
    public int $value;

    public function __construct(int $value)
    {
        if ($value < 0) {
            throw new NumberMustBePositiveError();
        }

        $this->value = $value;
    }
}
