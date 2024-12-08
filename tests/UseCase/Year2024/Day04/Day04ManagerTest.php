<?php

namespace App\Tests\UseCase\Year2024\Day04;

use App\Tests\UseCase\DayManagerTestInterface;
use App\UseCase\Year2024\Day04\Day04Manager;
use PHPUnit\Framework\TestCase;

class Day04ManagerTest extends TestCase implements DayManagerTestInterface
{
    public function testProcessPartOne(): void
    {
        $day04Manager = new Day04Manager();

        
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

        $this::assertEquals(18, $day04Manager->processPartOne($input));
    }

    public function testProcessPartTwo(): void
    {
        $day04Manager = new Day04Manager();

        
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

        $this::assertEquals(18, $day04Manager->processPartTwo($input));
    }
}
