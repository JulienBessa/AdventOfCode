<?php

namespace App\Tests\UseCase\Year2024\Day02;

use App\UseCase\Year2024\Day02\InputExtractor;
use PHPUnit\Framework\TestCase;

class InputExtractorTest extends TestCase
{
    public function testParseInputToArrayTest(): void
    {
        $input = '7 6 4 2 1
1 2 7 8 9
9 7 6 2 1
1 3 2 4 5
8 6 4 4 1
1 3 6 7 9';

        $expected = [
            [7, 6, 4, 2, 1],
            [1, 2, 7, 8, 9],
            [9, 7, 6, 2, 1],
            [1, 3, 2, 4, 5],
            [8, 6, 4, 4, 1],
            [1, 3, 6, 7, 9],
        ];

        $this::assertEquals($expected, InputExtractor::parseInputToArray($input));
    }
}
