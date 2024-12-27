<?php

namespace App\Tests\UseCase\Year2024\Day08;

use App\Inputs\Year2024\Day08\InputDay08;
use App\UseCase\Year2024\Day08\BoundChecker;
use App\UseCase\Year2024\Day08\InputExtractor;
use PHPUnit\Framework\TestCase;

class BoundCheckerTest extends TestCase
{
    public function testIsOutOfBound(): void
    {
        $datas = [
            [
                'coordinates' => ['row' => 1, 'col' => 8],
                'expected' => false,
            ],
            [
                'coordinates' => ['row' => 1, 'col' => 66],
                'expected' => true,
            ],
        ];

        foreach ($datas as $key => $data) {
            $this::assertEquals($data['expected'], BoundChecker::isOutOfBound(InputExtractor::transformInputIntoArray(InputExtractor::parseInputToRows(InputDay08::INPUT_TEST)), $data['coordinates']), 'Assert ' . $key + 1);
        }
    }
}
