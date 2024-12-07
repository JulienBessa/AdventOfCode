<?php

namespace App\Tests\UseCase\Year2024\Day01;

use App\Tests\UseCase\DayManagerTestInterface;
use App\UseCase\Year2024\Day01\Day01Manager;
use PHPUnit\Framework\TestCase;

final class Day01ManagerTest extends TestCase implements DayManagerTestInterface
{
    public function testProcessPartOne(): void
    {
        $day01Manager = new Day01Manager();

        $input = '3   4
4   3
2   5
1   3
3   9
3   3';

        $this::assertEquals(11, $day01Manager->processPartOne($input));
    }

    public function testProcessPartTwo(): void
    {
        $day01Manager = new Day01Manager();

        $input = '3   4
4   3
2   5
1   3
3   9
3   3';

        $this::assertEquals(31, $day01Manager->processPartTwo($input));
    }
}
