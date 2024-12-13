<?php

namespace App\Tests\UseCase\Year2024\Day04;

use App\UseCase\Year2024\Day04\InputExtractor;
use PHPUnit\Framework\TestCase;

final class InputExtractorTest extends TestCase
{
    public function testParseInputToRows(): void
    {
        $input = 'MMMSXXMASM
MSAMXMSMSA
AMXSXMAAMM
MSAMASMSMX
XMASAMXAMM
XXAMMXXAMA
SMSMSASXSS
SAXAMASAAA
MAMMMXMMMM
MXMXAXMASX';

        $expected = [
            'MMMSXXMASM',
            'MSAMXMSMSA',
            'AMXSXMAAMM',
            'MSAMASMSMX',
            'XMASAMXAMM',
            'XXAMMXXAMA',
            'SMSMSASXSS',
            'SAXAMASAAA',
            'MAMMMXMMMM',
            'MXMXAXMASX',
        ];

        $this::assertEquals($expected, InputExtractor::parseInputToRows($input));
    }

    public function testParseVertical(): void
    {
        $input = [
            'MMMSXXMASM',
            'MSAMXMSMSA',
            'AMXSXMAAMM',
            'MSAMASMSMX',
            'XMASAMXAMM',
            'XXAMMXXAMA',
            'SMSMSASXSS',
            'SAXAMASAAA',
            'MAMMMXMMMM',
            'MXMXAXMASX',
        ];

        $expected = [
            'MMAMXXSSMM',
            'MSMSMXMAAX',
            'MAXAAASXMM',
            'SMSMSMMAMX',
            'XXXAAMSMMA',
            'XMMSMXAAXX',
            'MSAMXXSSMM',
            'AMASAAXAMA',
            'SSMMMMSAMS',
            'MAMXMASAMX',
        ];

        $this::assertEquals($expected, InputExtractor::parseVertical($input));
    }

    public function testParseDiagonalFromNorthWestToSouthEast(): void
    {
        $input = [
            'ABCDEF',
            'GHIJKL',
            'MNOPQR',
            'STUVWX',
            'YZABCD',
            'EFGHIJ',
        ];

        $expected = [
            'AHOVCJ',
            'GNUBI',
            'BIPWD',
            'MTAH',
            'CJQX',
            'SZG',
            'DKR',
            'YF',
            'EL',
            'E',
            'F',
        ];

        $this::assertEquals($expected, InputExtractor::parseDiagonalFromNorthWestToSouthEast($input));
    }

    public function testParseDiagonalFromSouthWestToNorthEast(): void
    {
        $input = [
            'ABCDEF',
            'GHIJKL',
            'MNOPQR',
            'STUVWX',
            'YZABCD',
            'EFGHIJ',
        ];

        $expected = [
            'EZUPKF',
            'FAVQL',
            'YTOJE',
            'GBWR',
            'SNID',
            'HCX',
            'MHC',
            'ID',
            'GB',
            'J',
            'A',
        ];

        $this::assertEquals($expected, InputExtractor::parseDiagonalFromSouthWestToNorthEast($input));
    }

    public function testTransformRowIntoArray(): void
    {
        $rows = [
            [
                'expected' => [
                    'A',
                    'Z',
                    'E',
                ],
                'data' => 'AZE',
            ],
            [
                'expected' => [
                    'Q',
                    'S',
                    'D',
                ],
                'data' => 'QSD',
            ],
            [
                'expected' => [
                    'W',
                    'X',
                    'C',
                ],
                'data' => 'WXC',
            ],
        ];

        foreach ($rows as $row) {
            $this::assertEquals($row["expected"], InputExtractor::transformRowIntoArray($row["data"]));
        }
    }
}
