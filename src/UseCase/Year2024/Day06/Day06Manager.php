<?php

namespace App\UseCase\Year2024\Day06;

use App\Enum\Day06\Direction;
use App\UseCase\DayManagerInterface;

class Day06Manager implements DayManagerInterface
{
    public function processPartOne(string $input, bool $returnArray = false): mixed
    {
        $patrolPath = [];

        $rows = InputExtractor::parseInputToRows($input);
        $fullMap = InputExtractor::transformInputIntoArray($rows);
        $currentDirection = Direction::NORTH;
        $currentPosition = PatrolChecker::findGuardPosition($fullMap);

        $patrolPathKeyVal = [];

        $patrolPath[] = "row" . $currentPosition['row'] . 'col' . $currentPosition['col'];
        $patrolPathKeyVal[] = [
            "row" => $currentPosition['row'],
            "col" => $currentPosition['col'],
        ];

        while (!PatrolChecker::isPatrolFinished($fullMap, $currentPosition, $currentDirection)) {
            if (PatrolChecker::isFacingObstacle($fullMap, $currentPosition, $currentDirection)) {
                $currentDirection = PatrolChecker::rotate($currentDirection);
            }

            $currentPosition = PatrolChecker::nextPosition($currentPosition, $currentDirection);

            if (!in_array("row" . $currentPosition['row'] . 'col' . $currentPosition['col'], $patrolPath)) {
                $patrolPath[] = "row" . $currentPosition['row'] . 'col' . $currentPosition['col'];
                $patrolPathKeyVal[] = [
                    "row" => $currentPosition['row'],
                    "col" => $currentPosition['col'],
                ];
            }
        }

        if ($returnArray) {
            return $patrolPathKeyVal;
        }

        return count($patrolPath);
    }

    public function processPartTwo(string $input): mixed
    {
        $nb = 0;

        $patrolPathKeyVal = $this->processPartOne($input, true);

        foreach ($patrolPathKeyVal as $key => $path) {
            if ($key !== count($patrolPathKeyVal)) {
                $rows = InputExtractor::parseInputToRows($input);
                $fullMap = InputExtractor::transformInputIntoArray($rows);
                $currentDirection = Direction::NORTH;
                $currentPosition = PatrolChecker::findGuardPosition($fullMap);

                $patrolPath = [];

                $patrolPath["row" . $currentPosition['row'] . 'col' . $currentPosition['col']] = 1;

                while (!PatrolChecker::isPatrolFinished($fullMap, $currentPosition, $currentDirection) && $patrolPath["row" . $currentPosition['row'] . 'col' . $currentPosition['col']] < 5) {
                    $fullMap = PatrolChecker::addObstacleToPosition($fullMap, $path['row'], $path['col']);

                    while (PatrolChecker::isFacingObstacle($fullMap, $currentPosition, $currentDirection)) {
                        $currentDirection = PatrolChecker::rotate($currentDirection);
                    }

                    $currentPosition = PatrolChecker::nextPosition($currentPosition, $currentDirection);

                    if (!array_key_exists("row" . $currentPosition['row'] . 'col' . $currentPosition['col'], $patrolPath)) {
                        $patrolPath["row" . $currentPosition['row'] . 'col' . $currentPosition['col']] = 0;
                    }

                    $patrolPath["row" . $currentPosition['row'] . 'col' . $currentPosition['col']]++;
                }

                if ($patrolPath["row" . $currentPosition['row'] . 'col' . $currentPosition['col']] >= 5) {
                    $nb++;
                }                
            }
        }
        
        return $nb;
    }
}
