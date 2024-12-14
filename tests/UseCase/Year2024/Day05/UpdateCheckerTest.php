<?php

namespace App\Tests\UseCase\Year2024\Day05;

use App\Inputs\Year2024\Day05\InputDay05;
use App\UseCase\Year2024\Day05\InputExtractor;
use App\UseCase\Year2024\Day05\UpdateChecker;
use PHPUnit\Framework\TestCase;

class UpdateCheckerTest extends TestCase
{
    public function testGetMiddleItem(): void
    {
        $rows = [
            [
                "data" => [75, 47, 61, 53, 29],
                "expected" => 61
            ],
            [
                "data" => [97, 61, 53, 29, 13],
                "expected" => 53
            ],
            [
                "data" => [75, 29, 13],
                "expected" => 29
            ],
            [
                "data" => [75, 97, 47, 61, 53],
                "expected" => 47
            ],
            [
                "data" => [61, 13, 29],
                "expected" => 13
            ],
            [
                "data" => [97, 13, 75, 29, 47],
                "expected" => 75
            ],
        ];

        foreach ($rows as $row) {
            $this::assertEquals($row['expected'], UpdateChecker::getMiddleItem($row['data']));
        }
    }

    public function testIsPagesBeforeOthers(): void
    {
        $rows = [
            [
                "data" => [75, 47, 61, 53, 29],
                "expected" => true
            ],
            [
                "data" => [97, 61, 53, 29, 13],
                "expected" => true
            ],
            [
                "data" => [75, 29, 13],
                "expected" => true
            ],
            [
                "data" => [75, 97, 47, 61, 53],
                "expected" => false
            ],
            [
                "data" => [61, 13, 29],
                "expected" => false
            ],
            [
                "data" => [97, 13, 75, 29, 47],
                "expected" => false
            ],
        ];

        foreach ($rows as $key => $row) {
            $this::assertEquals($row['expected'], UpdateChecker::isPagesBeforeOthers(InputExtractor::getPageOrderingRules(InputExtractor::parseInputToRows(InputDay05::INPUT_TEST)), $row['data']), 'Item ' . $key);
        }
    }
}
