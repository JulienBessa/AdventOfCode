<?php

namespace App\Tests\UseCase\Year2024\Day02;

use App\UseCase\Year2024\Day02\ConditionChecker;
use PHPUnit\Framework\TestCase;

final class ConditionCheckerTest extends TestCase
{
    public function testHasLevelStable(): void
    {
        $rows = [
            [
                'expected' => false,
                'data' => [7, 6, 4, 2, 1],
            ],
            [
                'expected' => false,
                'data' => [1, 2, 7, 8, 9],
            ],
            [
                'expected' => false,
                'data' => [9, 7, 6, 2, 1],
            ],
            [
                'expected' => false,
                'data' => [1, 3, 2, 4, 5],
            ],
            [
                'expected' => true,
                'data' => [8, 6, 4, 4, 1],
            ],
            [
                'expected' => false,
                'data' => [1, 3, 6, 7, 9],
            ],
        ];

        foreach ($rows as $row) {
            $this::assertEquals($row['expected'], ConditionChecker::hasLevelStable($row['data']));
        }
    }

    public function testHasLevelOnlyIncreasing(): void
    {
        $rows = [
            [
                'expected' => false,
                'data' => [7, 6, 4, 2, 1],
            ],
            [
                'expected' => true,
                'data' => [1, 2, 7, 8, 9],
            ],
            [
                'expected' => false,
                'data' => [9, 7, 6, 2, 1],
            ],
            [
                'expected' => false,
                'data' => [1, 3, 2, 4, 5],
            ],
            [
                'expected' => false,
                'data' => [8, 6, 4, 4, 1],
            ],
            [
                'expected' => true,
                'data' => [1, 3, 6, 7, 9],
            ],
        ];

        foreach ($rows as $row) {
            $this::assertEquals($row['expected'], ConditionChecker::hasLevelOnlyIncreasing($row['data']));
        }
    }

    public function testHasLevelOnlyDecreasing(): void
    {
        $rows = [
            [
                'expected' => true,
                'data' => [7, 6, 4, 2, 1],
            ],
            [
                'expected' => false,
                'data' => [1, 2, 7, 8, 9],
            ],
            [
                'expected' => true,
                'data' => [9, 7, 6, 2, 1],
            ],
            [
                'expected' => false,
                'data' => [1, 3, 2, 4, 5],
            ],
            [
                'expected' => true,
                'data' => [8, 6, 4, 4, 1],
            ],
            [
                'expected' => false,
                'data' => [1, 3, 6, 7, 9],
            ],
        ];

        foreach ($rows as $row) {
            $this::assertEquals($row['expected'], ConditionChecker::hasLevelOnlyDecreasing($row['data']));
        }
    }

    public function testHasDifferenceOnlyBetweenOneAndThree(): void
    {
        $rows = [
            [
                'expected' => true,
                'data' => [7, 6, 4, 2, 1],
            ],
            [
                'expected' => false,
                'data' => [1, 2, 7, 8, 9],
            ],
            [
                'expected' => false,
                'data' => [9, 7, 6, 2, 1],
            ],
            [
                'expected' => true,
                'data' => [1, 3, 2, 4, 5],
            ],
            [
                'expected' => false,
                'data' => [8, 6, 4, 4, 1],
            ],
            [
                'expected' => true,
                'data' => [1, 3, 6, 7, 9],
            ],
        ];

        foreach ($rows as $row) {
            $this::assertEquals($row['expected'], ConditionChecker::hasDifferenceOnlyBetweenOneAndThree($row['data']));
        }
    }
}
