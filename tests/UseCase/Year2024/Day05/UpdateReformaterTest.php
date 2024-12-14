<?php

namespace App\Tests\UseCase\Year2024\Day05;

use App\Inputs\Year2024\Day05\InputDay05;
use App\UseCase\Year2024\Day05\InputExtractor;
use App\UseCase\Year2024\Day05\UpdateReformater;
use PHPUnit\Framework\TestCase;

class UpdateReformaterTest extends TestCase
{
    public function testReorderRow(): void
    {
        $rows = [
            [
                'data' => [75, 97, 47, 61, 53],
                'expected' => [97, 75, 47, 61, 53],
            ],
            [
                'data' => [61, 13, 29],
                'expected' => [61, 29, 13],
            ],
            [
                'data' => [97, 13, 75, 29, 47],
                'expected' => [97, 75, 47, 29, 13],
            ],
        ];

        foreach ($rows as $key => $row) {
            $this::assertEquals($row['expected'], UpdateReformater::reorderRow(InputExtractor::getPageOrderingRules(InputExtractor::parseInputToRows(InputDay05::INPUT_TEST)), $row['data']), 'Item ' . $key);
        }
    }
}
