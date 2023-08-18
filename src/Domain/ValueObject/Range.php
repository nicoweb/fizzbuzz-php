<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Domain\ValueObject;

use NicolasLefevre\FizzBuzz\Domain\Error\FromMustBeLessThanToError;
use SplFixedArray;

final readonly class Range {
    private From $from;
    private ?To $to;

    public function __construct(From $from, ?To $to) {
        if ($to && $from->value > $to->value) {
            throw new FromMustBeLessThanToError();
        }

        $this->from = $from;
        $this->to = $to;
    }

    public function sequence(): SplFixedArray {
        return SplFixedArray::fromArray($this->to
            ? range($this->from->value, $this->to->value)
            : range($this->from->value, $this->from->value)
        );
    }
}
