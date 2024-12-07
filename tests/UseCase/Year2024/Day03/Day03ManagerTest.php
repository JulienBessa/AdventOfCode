<?php

namespace App\Tests\UseCase\Year2024\Day03;

use App\Tests\UseCase\DayManagerTestInterface;
use App\UseCase\Year2024\Day03\Day03Manager;
use PHPUnit\Framework\TestCase;

final class Day03ManagerTest extends TestCase implements DayManagerTestInterface
{
    public function testProcessPartOne(): void
    {
        $day03Manager = new Day03Manager();

        $input = 'xmul(2,4)%&mul[3,7]!@^do_not_mul(5,5)+mul(32,64]then(mul(11,8)mul(8,5))';
        
        $this::assertEquals(161, $day03Manager->processPartOne($input));
    }

    public function testProcessPartTwo(): void
    {
        $day03Manager = new Day03Manager();

        $input = "xmul(2,4)&mul[3,7]!^don't()_mul(5,5)+mul(32,64](mul(11,8)undo()?mul(8,5))";

        $this::assertEquals(48, $day03Manager->processPartTwo($input));
    }
}
