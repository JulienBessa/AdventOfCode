<?php

namespace App\Tests\UseCase\Year2024\Day05;

use App\Inputs\Year2024\Day05\InputDay05;
use App\Tests\UseCase\DayManagerTestInterface;
use App\UseCase\Year2024\Day05\Day05Manager;
use PHPUnit\Framework\TestCase;

class Day05ManagerTest extends TestCase implements DayManagerTestInterface
{
    public function testProcessPartOne(): void
    {
        $day05Manager = new Day05Manager();

        $this::assertEquals(143, $day05Manager->processPartOne(InputDay05::INPUT_TEST));
    }

    public function testProcessPartTwo(): void
    {
        $day05Manager = new Day05Manager();

        $this::assertEquals(123, $day05Manager->processPartTwo(InputDay05::INPUT_TEST));
    }
}
