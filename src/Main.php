<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz;

use NicolasLefevre\FizzBuzz\Application\FizzBuzzQueryHandler;
use NicolasLefevre\FizzBuzz\Domain\FizzBuzzMapper;
use NicolasLefevre\FizzBuzz\Presentation\FizzBuzzAction;
use NicolasLefevre\FizzBuzz\Presentation\Responder\FizzBuzzConsoleResponder;

require_once __DIR__ . '/../vendor/autoload.php';

$action = new FizzBuzzAction(
    new FizzBuzzQueryHandler(new FizzBuzzMapper()),
    new FizzBuzzConsoleResponder()
);

($action)(1, 100)->sendContent();
