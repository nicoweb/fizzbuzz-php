<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Domain\ValueObject;

use SplFixedArray;

final readonly class FizzBuzzSequence
{
    private function __construct(
        public SplFixedArray $value
    ) {
    }

    public static function from(SplFixedArray $sequence): self {
        return new self($sequence);
    }
}
