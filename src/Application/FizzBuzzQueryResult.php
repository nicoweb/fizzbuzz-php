<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Application;

use SplFixedArray;

final readonly class FizzBuzzQueryResult
{
    private function __construct(
        public SplFixedArray $value
    ) {
    }

    public static function from(SplFixedArray $sequence): FizzBuzzQueryResult {
        return new self($sequence);
    }

    /**
     * @return array<string>
     */
    public function toArray(): array
    {
        return $this->value->toArray();
    }
}
