<?php

declare(strict_types=1);

namespace NicolasLefevre\FizzBuzz\Tests\NicolasLefevre\Presentation;

use NicolasLefevre\FizzBuzz\Application\FizzBuzzQueryHandler;
use NicolasLefevre\FizzBuzz\Domain\FizzBuzzGenerator;
use NicolasLefevre\FizzBuzz\Presentation\FizzBuzzAction;
use NicolasLefevre\FizzBuzz\Presentation\Responder\FizzBuzzConsoleResponder;
use PHPUnit\Framework\TestCase;

final class FizzBuzzActionIntTest extends TestCase
{
    private FizzBuzzAction $action;

    public function setUp(): void
    {
        $handler = new FizzBuzzQueryHandler(new FizzBuzzGenerator());
        $this->action = new FizzBuzzAction($handler, new FizzBuzzConsoleResponder());
    }

    /** @test */
    public function itShouldReturnGoodFormattedResultWithRange1to100(): void
    {
        ob_start();
        ($this->action)(1, 100)->sendContent();
        $output = ob_get_contents();
        ob_end_clean();

        $this->assertSame($this->getOutputExpected(), $output);
    }

    private function getOutputExpected(): string
    {
        return <<<EOT
1
2
Fizz
4
Buzz
Fizz
7
8
Fizz
Buzz
11
Fizz
13
14
FizzBuzz
16
17
Fizz
19
Buzz
Fizz
22
23
Fizz
Buzz
26
Fizz
28
29
FizzBuzz
31
32
Fizz
34
Buzz
Fizz
37
38
Fizz
Buzz
41
Fizz
43
44
FizzBuzz
46
47
Fizz
49
Buzz
Fizz
52
53
Fizz
Buzz
56
Fizz
58
59
FizzBuzz
61
62
Fizz
64
Buzz
Fizz
67
68
Fizz
Buzz
71
Fizz
73
74
FizzBuzz
76
77
Fizz
79
Buzz
Fizz
82
83
Fizz
Buzz
86
Fizz
88
89
FizzBuzz
91
92
Fizz
94
Buzz
Fizz
97
98
Fizz
Buzz

EOT;
    }
}
