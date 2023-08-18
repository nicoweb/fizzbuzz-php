<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Domain\Error;

use DomainException;

final class FromMustBeLessThanToError extends DomainException
{
    public function __construct(string $message = "From must be less than to")
    {
        parent::__construct($message);
    }
}
