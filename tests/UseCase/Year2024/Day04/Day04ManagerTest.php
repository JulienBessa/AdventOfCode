<?php

namespace App\Tests\UseCase\Year2024\Day04;

use App\Inputs\Year2024\Day04\InputDay04;
use App\Tests\UseCase\DayManagerTestInterface;
use App\UseCase\Year2024\Day04\Day04Manager;
use PHPUnit\Framework\TestCase;

class Day04ManagerTest extends TestCase implements DayManagerTestInterface
{
    public function testProcessPartOne(): void
    {
        $day04Manager = new Day04Manager();

        $this::assertEquals(18, $day04Manager->processPartOne(InputDay04::INPUT_TEST));
    }

    public function testProcessPartTwo(): void
    {
        $day04Manager = new Day04Manager();

        $this::assertEquals(9, $day04Manager->processPartTwo(InputDay04::INPUT_TEST));
    }
}
