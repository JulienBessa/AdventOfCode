<?php

namespace App\Tests\UseCase\Year2024\Day06;

use App\Inputs\Year2024\Day06\InputDay06;
use App\UseCase\Year2024\Day06\InputExtractor;
use PHPUnit\Framework\TestCase;

final class InputExtractorTest extends TestCase
{
    public function testParseInputToRows(): void
    {
        $expected = [
            '....#.....',
            '.........#',
            '..........',
            '..#.......',
            '.......#..',
            '..........',
            '.#..^.....',
            '........#.',
            '#.........',
            '......#...',
        ];

        $this::assertEquals($expected, InputExtractor::parseInputToRows(InputDay06::INPUT_TEST));
    }

    public function testTransformInputIntoArray(): void
    {
        $expected = [
            ['.', '.', '.', '.', '#', '.', '.', '.', '.', '.'],
            ['.', '.', '.', '.', '.', '.', '.', '.', '.', '#'],
            ['.', '.', '.', '.', '.', '.', '.', '.', '.', '.'],
            ['.', '.', '#', '.', '.', '.', '.', '.', '.', '.'],
            ['.', '.', '.', '.', '.', '.', '.', '#', '.', '.'],
            ['.', '.', '.', '.', '.', '.', '.', '.', '.', '.'],
            ['.', '#', '.', '.', '^', '.', '.', '.', '.', '.'],
            ['.', '.', '.', '.', '.', '.', '.', '.', '#', '.'],
            ['#', '.', '.', '.', '.', '.', '.', '.', '.', '.'],
            ['.', '.', '.', '.', '.', '.', '#', '.', '.', '.'],
        ];

        $this::assertEquals($expected, InputExtractor::transformInputIntoArray(InputExtractor::parseInputToRows(InputDay06::INPUT_TEST)));
    }
}
