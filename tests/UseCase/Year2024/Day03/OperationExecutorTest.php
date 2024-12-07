<?php

namespace App\Tests\UseCase\Year2024\Day03;

use App\UseCase\Year2024\Day03\OperationExecutor;
use PHPUnit\Framework\TestCase;

final class OperationExecutorTest extends TestCase
{
    public function testMultiply(): void
    {
        $rows = [
            [
                'expected' => 8,
                'data' => [2, 4],
            ],
            [
                'expected' => 25,
                'data' => [5, 5],
            ],
            [
                'expected' => 88,
                'data' => [11, 8],
            ],
            [
                'expected' => 40,
                'data' => [8, 5],
            ],
        ];

        foreach ($rows as $row) {
            $this::assertEquals($row['expected'], OperationExecutor::multiply($row['data']));
        }
    }

    public function testAdd(): void
    {
        $input = [8, 25, 88, 40];

        $this::assertEquals(161, OperationExecutor::add($input));
    }
}
