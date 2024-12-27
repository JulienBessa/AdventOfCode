<?php

namespace App\Tests\UseCase\Year2024\Day08;

use App\Inputs\Year2024\Day08\InputDay08;
use App\Tests\UseCase\DayManagerTestInterface;
use App\UseCase\Year2024\Day08\Day08Manager;
use PHPUnit\Framework\TestCase;

class Day08ManagerTest extends TestCase implements DayManagerTestInterface
{
    public function testProcessPartOne(): void
    {
        $day08Manager = new Day08Manager();

        $this::assertEquals(14, $day08Manager->processPartOne(InputDay08::INPUT_TEST));
    }

    public function testProcessPartTwo(): void
    {
        $day08Manager = new Day08Manager();

        $this::assertEquals(34, $day08Manager->processPartTwo(InputDay08::INPUT_TEST));
    }
}
