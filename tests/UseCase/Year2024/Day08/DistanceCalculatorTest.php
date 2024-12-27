<?php

namespace App\Tests\UseCase\Year2024\Day08;

use App\Enum\Year2024\Day08\Operation;
use App\UseCase\Year2024\Day08\DistanceCalculator;
use PHPUnit\Framework\TestCase;

class DistanceCalculatorTest extends TestCase
{
    public function testCalculateDistance(): void
    {
        $datas = [
            [
                'firstElem' => ['row' => 1, 'col' => 8],
                'secondElem' => ['row' => 2, 'col' => 5],
                'expected' => ['row' => 1, 'col' => 3],
            ],
            [
                'firstElem' => ['row' => 1, 'col' => 8],
                'secondElem' => ['row' => 1, 'col' => 6],
                'expected' => ['row' => 0, 'col' => 2],
            ],
        ];

        foreach ($datas as $key => $data) {
            $this::assertEquals($data['expected'], DistanceCalculator::calculateDistance($data['firstElem'], $data['secondElem']), 'Assert ' . $key + 1);
        }
    }

    public function testCalculateAntinode(): void
    {
        $datas = [
            [
                'elem' => ['row' => 1, 'col' => 8],
                'coordinates' => ['row' => 2, 'col' => 5],
                'operationCol' => Operation::ADD,
                'operationRow' => Operation::ADD,
                'expected' => ['row' => 3, 'col' => 13],
            ],
            [
                'elem' => ['row' => 1, 'col' => 8],
                'coordinates' => ['row' => 3, 'col' => 5],
                'operationCol' => Operation::REMOVE,
                'operationRow' => Operation::REMOVE,
                'expected' => ['row' => -2, 'col' => 3],
            ],
        ];

        foreach ($datas as $key => $data) {
            $this::assertEquals($data['expected'], DistanceCalculator::calculateAntinode($data['elem'], $data['coordinates'], $data['operationRow'], $data['operationCol']), 'Assert ' . $key + 1);
        }
    }
}
