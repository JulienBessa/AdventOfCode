<?php

namespace App\Tests\UseCase\Year2024\Day02;

use App\Inputs\Year2024\Day02\InputDay02;
use App\Tests\UseCase\DayManagerTestInterface;
use App\UseCase\Year2024\Day02\Day02Manager;
use PHPUnit\Framework\TestCase;

final class Day02ManagerTest extends TestCase implements DayManagerTestInterface
{
    public function testProcessPartOne(): void
    {
        $day02Manager = new Day02Manager();

        $this::assertEquals(2, $day02Manager->processPartOne(InputDay02::INPUT_TEST));
    }

    public function testProcessPartTwo(): void
    {
        $day02Manager = new Day02Manager();

        $this::assertEquals(4, $day02Manager->processPartTwo(InputDay02::INPUT_TEST));
    }
}
