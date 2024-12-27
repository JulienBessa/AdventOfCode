<?php

namespace App\Tests\UseCase\Year2024\Day08;

use App\Inputs\Year2024\Day08\InputDay08;
use App\UseCase\Year2024\Day08\AntennaFinder;
use App\UseCase\Year2024\Day08\InputExtractor;
use PHPUnit\Framework\TestCase;

class AntennaFinderTest extends TestCase
{
    public function testFindAntennaCoordinates(): void
    {
        $expected = [
            '0' => [
                ['row' => 1, 'col' => 8],
                ['row' => 2, 'col' => 5],
                ['row' => 3, 'col' => 7],
                ['row' => 4, 'col' => 4],
            ],
            'A' => [
                ['row' => 5, 'col' => 6],
                ['row' => 8, 'col' => 8],
                ['row' => 9, 'col' => 9],
            ],
        ];

        $this::assertEquals($expected, AntennaFinder::findAntennaCoordinates(InputExtractor::transformInputIntoArray(InputExtractor::parseInputToRows(InputDay08::INPUT_TEST))));
    }
}
