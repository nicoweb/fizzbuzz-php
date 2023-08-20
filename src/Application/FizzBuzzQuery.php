<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Application;

use NicolasLefevre\FizzBuzz\Domain\ValueObject\From;
use NicolasLefevre\FizzBuzz\Domain\ValueObject\To;

final readonly class FizzBuzzQuery
{
    public From $from;
    public ?To $to;

    public function __construct(
        int $from,
        ?int $to = null
    ) {
        $this->from = new From($from);
        $this->to = $to ? new To($to) : null;
    }
}
