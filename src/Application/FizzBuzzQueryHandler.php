<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Application;

use NicolasLefevre\FizzBuzz\Domain\FizzBuzzMapper;
use NicolasLefevre\FizzBuzz\Domain\ValueObject\Range;

final readonly class FizzBuzzQueryHandler
{
    public function __construct(
        private FizzBuzzMapper $fizzBuzzMapper,
    ) {
    }

    public function __invoke(FizzBuzzQuery $query): FizzBuzzQueryResult
    {
        $fizzBuzzSequence = $this->fizzBuzzMapper->map(
            new Range($query->from, $query->to)
        );

        return FizzBuzzQueryResult::from($fizzBuzzSequence);
    }
}
