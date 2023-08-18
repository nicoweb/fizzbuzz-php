<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Application;

use NicolasLefevre\FizzBuzz\Domain\FizzBuzzMapper;
use NicolasLefevre\FizzBuzz\Domain\ValueObject\Range;
use SplFixedArray;

final readonly class FizzBuzzQueryHandler
{
    public function __construct(
        private FizzBuzzMapper $fizzBuzzMapper,
    ) {
    }

    public function __invoke(FizzBuzzQuery $query): FizzBuzzQueryResult
    {
        return $this->fizzBuzzMapper->map(
            new Range($query->from, $query->to)
        );
    }
}
