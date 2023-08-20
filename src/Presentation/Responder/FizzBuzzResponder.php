<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Presentation\Responder;

use NicolasLefevre\FizzBuzz\Application\FizzBuzzQueryResult;
use NicolasLefevre\FizzBuzz\Presentation\FizzBuzzResponse;

interface FizzBuzzResponder
{
    public function respond(FizzBuzzQueryResult $fizzBuzzResult): FizzBuzzResponse;
}
