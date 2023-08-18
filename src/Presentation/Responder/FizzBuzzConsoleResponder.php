<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Presentation\Responder;

use NicolasLefevre\FizzBuzz\Application\FizzBuzzQueryResult;
use NicolasLefevre\FizzBuzz\Presentation\FizzBuzzResponse;

final readonly class FizzBuzzConsoleResponder implements FizzBuzzResponder
{
    private const SEPARATOR = "\n";

    public function __invoke(FizzBuzzQueryResult $fizzBuzzResult): FizzBuzzResponse
    {
        return new FizzBuzzResponse(
            implode(self::SEPARATOR, $fizzBuzzResult->toArray()).self::SEPARATOR,
        );
    }
}
