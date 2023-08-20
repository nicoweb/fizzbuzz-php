<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Domain\ValueObject;

final readonly class From
{
    public int $value;

    public function __construct(int $value)
    {
        NumberValidator::validate($value);

        $this->value = $value;
    }
}
