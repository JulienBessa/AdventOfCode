<?php

namespace App\Tests\UseCase\Year2024\Day08;

use App\Inputs\Year2024\Day08\InputDay08;
use App\UseCase\Year2024\Day08\InputExtractor;
use PHPUnit\Framework\TestCase;

final class InputExtractorTest extends TestCase
{
    public function testParseInputToRows(): void
    {
        $expected = [
            '............',
            '........0...',
            '.....0......',
            '.......0....',
            '....0.......',
            '......A.....',
            '............',
            '............',
            '........A...',
            '.........A..',
            '............',
            '............',
        ];

        $this::assertEquals($expected, InputExtractor::parseInputToRows(InputDay08::INPUT_TEST));
    }

    public function testTransformInputIntoArray(): void
    {
        $expected = [
            ['.', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'],
            ['.', '.', '.', '.', '.', '.', '.', '.', '0', '.', '.', '.'],
            ['.', '.', '.', '.', '.', '0', '.', '.', '.', '.', '.', '.'],
            ['.', '.', '.', '.', '.', '.', '.', '0', '.', '.', '.', '.'],
            ['.', '.', '.', '.', '0', '.', '.', '.', '.', '.', '.', '.'],
            ['.', '.', '.', '.', '.', '.', 'A', '.', '.', '.', '.', '.'],
            ['.', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'],
            ['.', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'],
            ['.', '.', '.', '.', '.', '.', '.', '.', 'A', '.', '.', '.'],
            ['.', '.', '.', '.', '.', '.', '.', '.', '.', 'A', '.', '.'],
            ['.', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'],
            ['.', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.', '.'],
        ];

        $this::assertEquals($expected, InputExtractor::transformInputIntoArray(InputExtractor::parseInputToRows(InputDay08::INPUT_TEST)));
    }
}
