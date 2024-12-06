<?php

namespace App\UseCase\Year2024\Day01;

use PHPUnit\Framework\TestCase;

final class DistanceCalculatorTest extends TestCase
{
    public function testCalculateDistance(): void
    {
        $distanceCalculator = new DistanceCalculator();

        $input = [
            'firstCol' => [1, 2, 3, 3, 3, 4],
            'secondCol' => [3, 3, 3, 4, 5, 9],
        ];

        $this->assertEquals(11, $distanceCalculator->calculateDistance($input));
    }
}
