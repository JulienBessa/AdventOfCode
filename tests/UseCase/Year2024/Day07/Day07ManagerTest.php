<?php

namespace App\Tests\UseCase\Year2024\Day07;

use App\Inputs\Year2024\Day07\InputDay07;
use App\Tests\UseCase\DayManagerTestInterface;
use App\UseCase\Year2024\Day07\Day07Manager;
use PHPUnit\Framework\TestCase;

final class Day07ManagerTest extends TestCase implements DayManagerTestInterface
{
    public function testProcessPartOne(): void
    {
        $day07Manager = new Day07Manager();

        $this::assertEquals(3749, $day07Manager->processPartOne(InputDay07::INPUT_TEST));
    }

    public function testProcessPartTwo(): void
    {
        $day07Manager = new Day07Manager();

        $this::assertEquals(11387, $day07Manager->processPartTwo(InputDay07::INPUT_TEST));
    }
}
