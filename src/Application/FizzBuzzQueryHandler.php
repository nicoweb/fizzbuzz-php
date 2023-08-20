<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Application;

use NicolasLefevre\FizzBuzz\Domain\FizzBuzzGenerator;
use NicolasLefevre\FizzBuzz\Domain\ValueObject\Range;

final readonly class FizzBuzzQueryHandler
{
    public function __construct(
        private FizzBuzzGenerator $fizzBuzzGenerator,
    ) {
    }

    public function handle(FizzBuzzQuery $query): FizzBuzzQueryResult
    {
        $fizzBuzzSequence = $this->fizzBuzzGenerator->generate(
            new Range($query->from, $query->to)
        );

        return FizzBuzzQueryResult::from($fizzBuzzSequence);
    }
}
