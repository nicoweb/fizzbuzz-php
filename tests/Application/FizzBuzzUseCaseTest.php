<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Tests\Application;

use NicolasLefevre\FizzBuzz\Application\FizzBuzzQuery;
use NicolasLefevre\FizzBuzz\Application\FizzBuzzQueryHandler;
use NicolasLefevre\FizzBuzz\Domain\Error\FromMustBeLessThanToError;
use NicolasLefevre\FizzBuzz\Domain\Error\NumberMustBePositiveError;
use NicolasLefevre\FizzBuzz\Domain\FizzBuzzGenerator;
use PHPUnit\Framework\TestCase;

final class FizzBuzzUseCaseTest extends TestCase
{
    private FizzBuzzQueryHandler $handler;

    public function setUp(): void
    {
       $this->handler = new FizzBuzzQueryHandler(new FizzBuzzGenerator());
    }

    /** @test */
    public function itShouldReturn1With1(): void
    {
        $this->assertSame(['1'], ($this->handler->handle(new FizzBuzzQuery(1))->toArray()));
    }

    /** @test */
    public function itShouldReturn2With2(): void
    {
        $this->assertSame(['2'], ($this->handler->handle(new FizzBuzzQuery(2))->toArray()));
    }

    /** @test */
    public function itShouldReturnFizzWith3(): void
    {
        $this->assertSame(['Fizz'], ($this->handler->handle(new FizzBuzzQuery(3))->toArray()));
    }

    /** @test */
    public function itShouldReturnBuzzWith5(): void
    {
        $this->assertSame(['Buzz'], ($this->handler->handle(new FizzBuzzQuery(5))->toArray()));
    }

    /** @test */
    public function itShouldReturnFizzWith6(): void
    {
        $this->assertSame(['Fizz'], ($this->handler->handle(new FizzBuzzQuery(6))->toArray()));
    }

    /** @test */
    public function itShouldReturnFizzWith9(): void
    {
        $this->assertSame(['Fizz'], ($this->handler->handle(new FizzBuzzQuery(9))->toArray()));
    }

    /** @test */
    public function itShouldReturnFizzWith10(): void
    {
        $this->assertSame(['Buzz'], ($this->handler->handle(new FizzBuzzQuery(10))->toArray()));
    }

    /** @test */
    public function itShouldReturnFizzBuzzWith15(): void
    {
        $this->assertSame(['FizzBuzz'], ($this->handler->handle(new FizzBuzzQuery(15))->toArray()));
    }

    /** @test */
    public function itShouldReturnFizzBuzzWith30(): void
    {
        $this->assertSame(['FizzBuzz'], ($this->handler->handle(new FizzBuzzQuery(30))->toArray()));
    }

    /** @test */
    public function itShouldReturn12With1and2(): void
    {
        $this->assertSame(["1", "2"], ($this->handler->handle(new FizzBuzzQuery(1, 2))->toArray()));
    }

    /** @test */
    public function itShouldReturn12FizzWith1and2and3(): void
    {
        $this->assertSame(['1', '2', 'Fizz'], ($this->handler->handle(new FizzBuzzQuery(1, 3))->toArray()));
    }

    /** @test */
    public function itShouldReturn12FizzWithRange1to5(): void
    {
        $this->assertSame(['1', '2', 'Fizz', '4', 'Buzz'],
            ($this->handler->handle(new FizzBuzzQuery(1, 5))->toArray()),
        );
    }

    /** @test */
    public function itShouldThrowErrorWhenFromIsNegative(): void
    {
        $this->expectException(NumberMustBePositiveError::class);
        $this->handler->handle(new FizzBuzzQuery(-1));
    }

    /** @test */
    public function itShouldThrowErrorWhenFromIsO(): void
    {
        $this->expectException(NumberMustBePositiveError::class);
        $this->handler->handle(new FizzBuzzQuery(0));
    }

    /** @test */
    public function itShouldThrowErrorWhenToIsNegative(): void
    {
        $this->expectException(NumberMustBePositiveError::class);
        $this->handler->handle(new FizzBuzzQuery(0, -1));
    }

    /** @test */
    public function itShouldThrowErrorWhenFromIsBiggerThanTo(): void
    {
        $this->expectException(FromMustBeLessThanToError::class);
        $this->handler->handle(new FizzBuzzQuery(10, 5));
    }

    /** @test */
    public function itShouldReturn1WhenFromIs1AndToIs1(): void
    {
        $this->assertSame(['1'], ($this->handler->handle(new FizzBuzzQuery(1, 1))->toArray()));
    }
}
