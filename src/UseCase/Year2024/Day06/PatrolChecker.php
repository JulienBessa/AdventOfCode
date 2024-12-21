<?php

namespace App\UseCase\Year2024\Day06;

use App\Enum\Day06\Direction;

class PatrolChecker
{
    /**
     * @param array<int,array<int,string>> $input
     * 
     * @return array<string,int>
     */
    public static function findGuardPosition(array $input): array
    {
        $position = [];

        foreach ($input as $keyRow => $row) {
            foreach ($row as $keyCol => $item) {
                if ($item === '^') {
                    $position["row"] = $keyRow;
                    $position["col"] = $keyCol;
                }
            }
        }

        return $position;
    }

    /**
     * @param array<int,array<int,string>> $fullMap
     * @param array<string,int> $currentPosition
     */
    public static function isFacingObstacle(array $fullMap, array $currentPosition, Direction $direction): bool
    {
        switch($direction){
            case Direction::NORTH:
                $nextPosItem = $fullMap[$currentPosition["row"] - 1][$currentPosition["col"]];
                break;
            case Direction::EAST:
                $nextPosItem = $fullMap[$currentPosition["row"]][$currentPosition["col"] + 1];
                break;
            case Direction::SOUTH:
                $nextPosItem = $fullMap[$currentPosition["row"] + 1][$currentPosition["col"]];
                break;
            case Direction::WEST:
                $nextPosItem = $fullMap[$currentPosition["row"]][$currentPosition["col"] - 1];
                break;
        }

        return $nextPosItem === '#';
    }

    /**
     * @param array<int,array<int,string>> $fullMap
     * @param array<string,int> $currentPosition
     */
    public static function isPatrolFinished(array $fullMap, array $currentPosition, Direction $direction): bool
    {
        $nextRow = $currentPosition["row"];
        $nextCol = $currentPosition["col"];
        switch($direction){
            case Direction::NORTH:
                $nextRow--;
                break;
            case Direction::EAST:
                $nextCol++;
                break;
            case Direction::SOUTH:
                $nextRow++;
                break;
            case Direction::WEST:
                $nextCol--;
                break;
        }

        return ($nextCol < 0 || $nextRow < 0 || $nextCol === count($fullMap) || $nextRow === count($fullMap));
    }

    public static function rotate(Direction $direction): Direction
    {
        switch($direction){
            case Direction::NORTH:
                $nextDirection = Direction::EAST;
                break;
            case Direction::EAST:
                $nextDirection = Direction::SOUTH;
                break;
            case Direction::SOUTH:
                $nextDirection = Direction::WEST;
                break;
            case Direction::WEST:
                $nextDirection = Direction::NORTH;
                break;
        }

        return $nextDirection;
    }

    /**
     * @param array<string,int> $currentPosition
     * 
     * @return array<string,int> $currentPosition
     */
    public static function nextPosition(array $currentPosition, Direction $direction): array
    {
        $nextPosition = [];

        switch($direction){
            case Direction::NORTH:
                $nextPosition["col"] = $currentPosition['col'];
                $nextPosition["row"] = $currentPosition['row'] - 1;
                break;
            case Direction::EAST:
                $nextPosition["col"] = $currentPosition['col'] + 1;
                $nextPosition["row"] = $currentPosition['row'];
                break;
            case Direction::SOUTH:
                $nextPosition["col"] = $currentPosition['col'];
                $nextPosition["row"] = $currentPosition['row'] + 1;
                break;
            case Direction::WEST:
                $nextPosition["col"] = $currentPosition['col'] - 1;
                $nextPosition["row"] = $currentPosition['row'];
                break;
        }

        return $nextPosition;
    }

    /**
     * @param array<int,array<int,string>> $fullMap
     * @return array<int,array<int,string>>
     */
    public static function addObstacleToPosition(array $fullMap, int $row, int $col): array
    {
        $newFullMap = $fullMap;
        $newFullMap[$row][$col] = '#';

        return $newFullMap;
    }
}
