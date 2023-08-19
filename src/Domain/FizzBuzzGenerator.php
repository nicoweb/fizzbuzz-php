<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Domain;

use NicolasLefevre\FizzBuzz\Domain\ValueObject\FizzBuzzSequence;
use NicolasLefevre\FizzBuzz\Domain\ValueObject\Range;

final class FizzBuzzGenerator
{
    private const FIZZ = 'Fizz';
    private const BUZZ = 'Buzz';
    private const FIZZ_BUZZ = self::FIZZ.self::BUZZ;
    private const FIZZ_FACTOR = 3;
    private const BUZZ_FACTOR = 5;
    private const FIZZ_BUZZ_FACTOR = 15;

    public function generate(Range $range): FizzBuzzSequence
    {
        return $this->generateForRange($range);
    }

    private function generateForRange(Range $range): FizzBuzzSequence
    {
        $sequence = $range->sequence();

        for ($i = 0; $i < $sequence->count(); $i++) {
            $sequence[$i] = $this->generateForNumber($sequence[$i]);
        }

        return FizzBuzzSequence::from($sequence);
    }

    private function generateForNumber(int $number): string
    {
        if ($this->isFizzBuzz($number)) {
            return self::FIZZ_BUZZ;
        }

        if ($this->isBuzz($number)) {
            return self::BUZZ;
        }

        if ($this->isFizz($number)) {
            return self::FIZZ;
        }

        return (string) $number;
    }

    private function isFizzBuzz(int $number): bool
    {
        return $number % self::FIZZ_BUZZ_FACTOR === 0;
    }

    private function isFizz(int $number): bool
    {
        return $number % self::FIZZ_FACTOR === 0;
    }

    private function isBuzz(int $number): bool
    {
        return $number % self::BUZZ_FACTOR === 0;
    }
}
