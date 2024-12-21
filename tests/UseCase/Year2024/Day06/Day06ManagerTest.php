<?php

namespace App\Tests\UseCase\Year2024\Day06;

use App\Inputs\Year2024\Day06\InputDay06;
use App\Tests\UseCase\DayManagerTestInterface;
use App\UseCase\Year2024\Day06\Day06Manager;
use PHPUnit\Framework\TestCase;

class Day06ManagerTest extends TestCase implements DayManagerTestInterface
{
    public function testProcessPartOne(): void
    {
        $day06Manager = new Day06Manager();

        $this::assertEquals(41, $day06Manager->processPartOne(InputDay06::INPUT_TEST, false));
    }

    public function testProcessPartTwo(): void
    {
        $day06Manager = new Day06Manager();

        $this::assertEquals(6, $day06Manager->processPartTwo(InputDay06::INPUT_TEST));
    }
}
