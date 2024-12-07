<?php

namespace App\Tests\UseCase\Year2024\Day02;

use App\UseCase\Year2024\Day02\Duplicator;
use PHPUnit\Framework\TestCase;

final class DuplicatorTest extends TestCase
{
    public function testDuplicateArray(): void
    {
        $rows = [
            [
                "expected" => [7, 6, 4, 2, 1],
                "data" => [7, 6, 4, 2, 1],
            ],
            [
                "expected" => [1, 2, 7, 8, 9],
                "data" => [1, 2, 7, 8, 9],
            ],
        ];

        foreach ($rows as $row) {
            $this::assertEquals($row["expected"], Duplicator::duplicateArray($row["data"]));
        }
    }
}
