<?php

namespace App\UseCase\Year2024\Day08;

use App\Enum\Year2024\Day08\Operation;
use App\UseCase\DayManagerInterface;

class Day08Manager implements DayManagerInterface
{
    public function processPartOne(string $input): int
    {
        $antinodes = [];

        $rows = InputExtractor::parseInputToRows($input);
        $arrayInput = InputExtractor::transformInputIntoArray($rows);
        $antennas = AntennaFinder::findAntennaCoordinates($arrayInput);

        foreach ($antennas as $character => $coordinates) {
            if (count($coordinates) === 1) {
                break;
            }

            for ($first=0; $first < count($coordinates) - 1; $first++) { 
                for ($second=$first + 1; $second < count($coordinates); $second++) { 
                    $distance = DistanceCalculator::calculateDistance($coordinates[$first], $coordinates[$second]);
                    
                    $firstAntinode = DistanceCalculator::calculateAntinode($coordinates[$first], $distance, Operation::REMOVE, ($coordinates[$first]['col'] < $coordinates[$second]['col']) ? Operation::REMOVE : Operation::ADD);
                    $secondAntinode = DistanceCalculator::calculateAntinode($coordinates[$second], $distance, Operation::ADD, ($coordinates[$first]['col'] < $coordinates[$second]['col']) ? Operation::ADD : Operation::REMOVE);

                    if (!BoundChecker::isOutOfBound($arrayInput, $firstAntinode)) {
                        if (!in_array('row' . $firstAntinode['row'] . 'col' . $firstAntinode['col'], $antinodes, true)) {
                            $antinodes[] = 'row' . $firstAntinode['row'] . 'col' . $firstAntinode['col'];
                        }
                    }

                    if (!BoundChecker::isOutOfBound($arrayInput, $secondAntinode)) {
                        if (!in_array('row' . $secondAntinode['row'] . 'col' . $secondAntinode['col'], $antinodes, true)) {
                            $antinodes[] = 'row' . $secondAntinode['row'] . 'col' . $secondAntinode['col'];
                        }
                    }
                }
            }
        }

        return count($antinodes);
    }

    public function processPartTwo(string $input): int
    {
        $antinodes = [];

        return count($antinodes);
    }
}
