<?php

namespace App\Tests\UseCase\Year2024\Day02;

use App\UseCase\Year2024\Day02\SafeCounter;
use PHPUnit\Framework\TestCase;

final class SafeCounterTest extends TestCase
{
    public function testCountSafe(): void
    {
        $input = [
            [7, 6, 4, 2, 1],
            [1, 2, 7, 8, 9],
            [9, 7, 6, 2, 1],
            [1, 3, 2, 4, 5],
            [8, 6, 4, 4, 1],
            [1, 3, 6, 7, 9],
        ];

        $this::assertEquals(2, SafeCounter::countSafe($input));
    }

    public function testCountSafeWithMaximumOneRemoved(): void
    {
        $input = [
            [7, 6, 4, 2, 1],
            [1, 2, 7, 8, 9],
            [9, 7, 6, 2, 1],
            [1, 3, 2, 4, 5],
            [8, 6, 4, 4, 1],
            [1, 3, 6, 7, 9],
        ];

        $this::assertEquals(4, SafeCounter::countSafeWithMaximumOneRemoved($input));
    }
}
