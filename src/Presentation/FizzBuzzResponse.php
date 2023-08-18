<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Presentation;

final readonly class FizzBuzzResponse
{
    public function __construct(
        private string $content,
    ) {
    }

    public function sendContent(): void
    {
        echo $this->content;
    }
}
