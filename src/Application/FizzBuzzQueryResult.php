<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Application;

use NicolasLefevre\FizzBuzz\Domain\ValueObject\FizzBuzzSequence;
use SplFixedArray;

final readonly class FizzBuzzQueryResult
{
    private function __construct(
        public SplFixedArray $value
    ) {
    }

    public static function from(FizzBuzzSequence $sequence): FizzBuzzQueryResult {
        return new self($sequence->value);
    }

    /**
     * @return array<string>
     */
    public function toArray(): array
    {
        return $this->value->toArray();
    }
}
