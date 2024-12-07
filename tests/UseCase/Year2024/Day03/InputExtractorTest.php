<?php

namespace App\Tests\UseCase\Year2024\Day03;

use App\UseCase\Year2024\Day03\InputExtractor;
use PHPUnit\Framework\TestCase;

final class InputExtractorTest extends TestCase
{
    public function testPregMatcher(): void
    {
        $input = 'xmul(2,4)%&mul[3,7]!@^do_not_mul(5,5)+mul(32,64]then(mul(11,8)mul(8,5))';
        $pattern = '/mul\(\d+,\d+\)/';

        $expected = [
            'mul(2,4)',
            'mul(5,5)',
            'mul(11,8)',
            'mul(8,5)',
        ];

        $this::assertEquals($expected, InputExtractor::pregMatcher($pattern, $input));
    }

    public function testParseInputToMultArray(): void
    {
        $input = 'xmul(2,4)%&mul[3,7]!@^do_not_mul(5,5)+mul(32,64]then(mul(11,8)mul(8,5))';

        $expected = [
            'mul(2,4)',
            'mul(5,5)',
            'mul(11,8)',
            'mul(8,5)',
        ];

        $this::assertEquals($expected, InputExtractor::parseInputToMultArray($input));
    }

    public function testParseInputToOperators(): void
    {
        $rows = [
            [
                'expected' => [2, 4],
                'data' => 'mul(2,4)',
            ],
            [
                'expected' => [5, 5],
                'data' => 'mul(5,5)',
            ],
            [
                'expected' => [11, 8],
                'data' => 'mul(11,8)',
            ],
            [
                'expected' => [8, 5],
                'data' => 'mul(8,5)',
            ],
        ];

        foreach ($rows as $row) {
            $this::assertEquals($row['expected'], InputExtractor::parseInputToOperators($row['data']));
        }
    }

    public function testParseInputToMultAndDoDontArrayArray(): void
    {
        $input = "xmul(2,4)&mul[3,7]!^don't()_mul(5,5)+mul(32,64](mul(11,8)undo()?mul(8,5))";

        $expected = [
            'mul(2,4)',
            "don't()",
            'mul(5,5)',
            'mul(11,8)',
            'do()',
            'mul(8,5)',
        ];

        $this::assertEquals($expected, InputExtractor::parseInputToMultAndDoDontArray($input));
    }

    public function testTreatDoAndDont(): void
    {
        $input = [
            'mul(2,4)',
            "don't()",
            'mul(5,5)',
            'mul(11,8)',
            'do()',
            'mul(8,5)',
        ];

        $expected = [
            'mul(2,4)',
            'mul(8,5)',
        ];

        $this::assertEquals($expected, InputExtractor::treatDoAndDont($input));
    }
}
