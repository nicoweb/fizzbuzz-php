<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Presentation;

use NicolasLefevre\FizzBuzz\Application\FizzBuzzQuery;
use NicolasLefevre\FizzBuzz\Application\FizzBuzzQueryHandler;
use NicolasLefevre\FizzBuzz\Presentation\Responder\FizzBuzzResponder;

final readonly class FizzBuzzAction
{
    public function __construct(
        private FizzBuzzQueryHandler $fizzBuzzQueryHandler,
        private FizzBuzzResponder $responder,
    ) {
    }

    public function execute(int $from, ?int $to): FizzBuzzResponse
    {
        $fizzBuzzResult = $this->fizzBuzzQueryHandler->handle(new FizzBuzzQuery($from, $to));

        return $this->responder->respond($fizzBuzzResult);
    }
}
