<?php

namespace App\Tests\UseCase\Year2024\Day04;

use App\UseCase\Year2024\Day04\InputFinder;
use PHPUnit\Framework\TestCase;

final class InputFinderTest extends TestCase
{
    public function testIsXmasInString(): void
    {
        $rows = [
            [
                'expected' => true,
                'data' => 'XMAS',
            ],
            [
                'expected' => false,
                'data' => 'SMXA',
            ],
            [
                'expected' => true,
                'data' => 'SAMX',
            ],
            [
                'expected' => false,
                'data' => 'AXSM',
            ],
        ];

        foreach ($rows as $row) {
            $this::assertEquals($row['expected'], InputFinder::isXmasInString($row['data']));
        }
    }

    public function testCountXmasInString(): void
    {
        $rows = [
            [
                'expected' => 1,
                'data' => 'MMMSXXMASM',
            ],
            [
                'expected' => 1,
                'data' => 'MSAMXMSMSA',
            ],
            [
                'expected' => 0,
                'data' => 'AMXSXMAAMM',
            ],
            [
                'expected' => 0,
                'data' => 'MSAMASMSMX',
            ],
            [
                'expected' => 2,
                'data' => 'XMASAMXAMM',
            ],
            [
                'expected' => 0,
                'data' => 'XXAMMXXAMA',
            ],
            [
                'expected' => 0,
                'data' => 'SMSMSASXSS',
            ],
            [
                'expected' => 0,
                'data' => 'SAXAMASAAA',
            ],
            [
                'expected' => 0,
                'data' => 'MAMMMXMMMM',
            ],
            [
                'expected' => 1,
                'data' => 'MXMXAXMASX',
            ],
        ];

        foreach ($rows as $row) {
            $this::assertEquals($row['expected'], InputFinder::countXmasInString($row['data']));
        }
    }

    public function testCountXmasInArray(): void
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

        $this::assertEquals(5, InputFinder::countXmasInArray($input));
    }
}
