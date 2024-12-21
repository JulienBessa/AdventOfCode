<?php

namespace App\Tests\UseCase\Year2024\Day01;

use App\Inputs\Year2024\Day01\InputDay01;
use App\Tests\UseCase\DayManagerTestInterface;
use App\UseCase\Year2024\Day01\Day01Manager;
use PHPUnit\Framework\TestCase;

final class Day01ManagerTest extends TestCase implements DayManagerTestInterface
{
    public function testProcessPartOne(): void
    {
        $day01Manager = new Day01Manager();

        $this::assertEquals(11, $day01Manager->processPartOne(InputDay01::INPUT_TEST));
    }

    public function testProcessPartTwo(): void
    {
        $day01Manager = new Day01Manager();

        $this::assertEquals(31, $day01Manager->processPartTwo(InputDay01::INPUT_TEST));
    }
}
