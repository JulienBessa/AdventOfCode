<?php

namespace App\Tests\UseCase\Year2024\Day01;

use App\UseCase\Year2024\Day01\InputExtractor;
use PHPUnit\Framework\TestCase;

class InputExtractorTest extends TestCase
{
    public function testParseInputToArrayTest(): void
    {
        $inputExtractor = new InputExtractor();

        $input = '3   4
4   3
2   5
1   3
3   9
3   3';

        $expected = [
            'firstCol' => [1, 2, 3, 3, 3, 4],
            'secondCol' => [3, 3, 3, 4, 5, 9],
        ];

        $this->assertEquals($expected, $inputExtractor->parseInputToArray($input));
    }
}
