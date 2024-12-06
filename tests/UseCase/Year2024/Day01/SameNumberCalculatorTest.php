<?php

namespace App\Tests\UseCase\Year2024\Day01;

use App\UseCase\Year2024\Day01\SameNumberCalculator;
use PHPUnit\Framework\TestCase;

final class SameNumberCalculatorTest extends TestCase
{
    public function testCalculate(): void
    {
        $sameNumberCalculator = new SameNumberCalculator();

        $input = [
            'firstCol' => [1, 2, 3, 3, 3, 4],
            'secondCol' => [3, 3, 3, 4, 5, 9],
        ];

        $this->assertEquals(31, $sameNumberCalculator->calculate($input));
    }
}