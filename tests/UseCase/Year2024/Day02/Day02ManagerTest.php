<?php

namespace App\Tests\UseCase\Year2024\Day02;

use App\Tests\UseCase\DayManagerTestInterface;
use App\UseCase\Year2024\Day02\Day02Manager;
use PHPUnit\Framework\TestCase;

final class Day02ManagerTest extends TestCase implements DayManagerTestInterface
{
    public function testProcessPartOne(): void
    {
        $day02Manager = new Day02Manager();

        $input = '7 6 4 2 1
1 2 7 8 9
9 7 6 2 1
1 3 2 4 5
8 6 4 4 1
1 3 6 7 9';

        $this::assertEquals(2, $day02Manager->processPartOne($input));
    }

    public function testProcessPartTwo(): void
    {
        $day02Manager = new Day02Manager();

        $input = '7 6 4 2 1
1 2 7 8 9
9 7 6 2 1
1 3 2 4 5
8 6 4 4 1
1 3 6 7 9';

        $this::assertEquals(4, $day02Manager->processPartTwo($input));
    }
}
