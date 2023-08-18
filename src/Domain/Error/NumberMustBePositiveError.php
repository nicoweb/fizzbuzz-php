<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Domain\Error;

use DomainException;

final class NumberMustBePositiveError extends DomainException
{
    public function __construct(string $message = "Number must be positive")
    {
        parent::__construct($message);
    }
}
