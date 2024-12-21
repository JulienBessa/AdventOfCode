<?php

namespace App\Tests\UseCase\Year2024\Day03;

use App\Inputs\Year2024\Day03\InputDay03;
use App\Tests\UseCase\DayManagerTestInterface;
use App\UseCase\Year2024\Day03\Day03Manager;
use PHPUnit\Framework\TestCase;

final class Day03ManagerTest extends TestCase implements DayManagerTestInterface
{
    public function testProcessPartOne(): void
    {
        $day03Manager = new Day03Manager();

        $this::assertEquals(161, $day03Manager->processPartOne(InputDay03::INPUT_TEST));
    }

    public function testProcessPartTwo(): void
    {
        $day03Manager = new Day03Manager();

        $this::assertEquals(48, $day03Manager->processPartTwo(InputDay03::INPUT_TEST));
    }
}
