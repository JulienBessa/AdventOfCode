<?php

namespace App\Tests\UseCase\Year2024\Day06;

use App\Enum\Day06\Direction;
use App\Inputs\Year2024\Day06\InputDay06;
use App\UseCase\Year2024\Day06\InputExtractor;
use App\UseCase\Year2024\Day06\PatrolChecker;
use PHPUnit\Framework\TestCase;

class PatrolCheckerTest extends TestCase
{
    public function testFindGuardPosition(): void
    {
        $expected = [
            "row" => 6,
            "col" => 4,
        ];

        $this::assertEquals($expected, PatrolChecker::findGuardPosition(InputExtractor::transformInputIntoArray(InputExtractor::parseInputToRows(InputDay06::INPUT_TEST))));
    }

    public function testIsFacingObstacle(): void
    {
        $rows = [
            [
                'position' => [
                    "row" => 6,
                    "col" => 4,
                ],
                'expected' => false,
                'direction' => Direction::NORTH,
            ],
            [
                'position' => [
                    "row" => 4,
                    "col" => 2,
                ],
                'expected' => true,
                'direction' => Direction::NORTH,
            ],
            [
                'position' => [
                    "row" => 2,
                    "col" => 2,
                ],
                'expected' => true,
                'direction' => Direction::SOUTH,
            ],
            [
                'position' => [
                    "row" => 2,
                    "col" => 2,
                ],
                'expected' => false,
                'direction' => Direction::EAST,
            ],
        ];

        foreach ($rows as $row) {
            $this::assertEquals($row['expected'], PatrolChecker::isFacingObstacle(InputExtractor::transformInputIntoArray(InputExtractor::parseInputToRows(InputDay06::INPUT_TEST)), $row['position'], $row['direction']));
        }
    }

    public function testIsPatrolFinished(): void
    {
        $rows = [
            [
                'position' => [
                    "row" => 6,
                    "col" => 4,
                ],
                'expected' => false,
                'direction' => Direction::NORTH,
            ],
            [
                'position' => [
                    "row" => 0,
                    "col" => 2,
                ],
                'expected' => true,
                'direction' => Direction::NORTH,
            ],
            [
                'position' => [
                    "row" => 9,
                    "col" => 2,
                ],
                'expected' => true,
                'direction' => Direction::SOUTH,
            ],
            [
                'position' => [
                    "row" => 2,
                    "col" => 2,
                ],
                'expected' => false,
                'direction' => Direction::EAST,
            ],
        ];

        foreach ($rows as $key => $row) {
            $this::assertEquals($row['expected'], PatrolChecker::isPatrolFinished(InputExtractor::transformInputIntoArray(InputExtractor::parseInputToRows(InputDay06::INPUT_TEST)), $row['position'], $row['direction']), 'Assert ' . $key + 1);
        }
    }

    public function testRotate(): void
    {
        $rows = [
            [
                'direction' => Direction::NORTH,
                'expected' => Direction::EAST,
            ],
            [
                'direction' => Direction::EAST,
                'expected' => Direction::SOUTH,
            ],
            [
                'direction' => Direction::SOUTH,
                'expected' => Direction::WEST,
            ],
            [
                'direction' => Direction::WEST,
                'expected' => Direction::NORTH,
            ],
        ];

        foreach ($rows as $key => $row) {
            $this::assertEquals($row['expected'], PatrolChecker::rotate($row['direction']), 'Assert ' . $key + 1);
        }
    }

    public function testNextPosition(): void
    {
        $rows = [
            [
                'position' => [
                    "row" => 6,
                    "col" => 4,
                ],
                'expected' => [
                    "row" => 5,
                    "col" => 4,
                ],
                'direction' => Direction::NORTH,
            ],
            [
                'position' => [
                    "row" => 4,
                    "col" => 2,
                ],
                'expected' => [
                    "row" => 3,
                    "col" => 2,
                ],
                'direction' => Direction::NORTH,
            ],
            [
                'position' => [
                    "row" => 2,
                    "col" => 2,
                ],
                'expected' => [
                    "row" => 3,
                    "col" => 2,
                ],
                'direction' => Direction::SOUTH,
            ],
            [
                'position' => [
                    "row" => 2,
                    "col" => 2,
                ],
                'expected' => [
                    "row" => 2,
                    "col" => 3,
                ],
                'direction' => Direction::EAST,
            ],
        ];

        foreach ($rows as $row) {
            $this::assertEquals($row['expected'], PatrolChecker::nextPosition($row['position'], $row['direction']));
        }
    }

    public function testAddObstacleToPosition(): void
    {
        $rows = [
            [
                "expected" => [
                    ['#', '.', '.', '.', '#', '.', '.', '.', '.', '.'],
                    ['.', '.', '.', '.', '.', '.', '.', '.', '.', '#'],
                    ['.', '.', '.', '.', '.', '.', '.', '.', '.', '.'],
                    ['.', '.', '#', '.', '.', '.', '.', '.', '.', '.'],
                    ['.', '.', '.', '.', '.', '.', '.', '#', '.', '.'],
                    ['.', '.', '.', '.', '.', '.', '.', '.', '.', '.'],
                    ['.', '#', '.', '.', '^', '.', '.', '.', '.', '.'],
                    ['.', '.', '.', '.', '.', '.', '.', '.', '#', '.'],
                    ['#', '.', '.', '.', '.', '.', '.', '.', '.', '.'],
                    ['.', '.', '.', '.', '.', '.', '#', '.', '.', '.'],
                ],
                "row" => 0,
                "col" => 0,
            ],
            [
                "expected" => [
                    ['.', '.', '.', '.', '#', '.', '.', '.', '.', '.'],
                    ['.', '.', '.', '.', '.', '.', '.', '.', '.', '#'],
                    ['.', '.', '.', '.', '.', '.', '.', '.', '.', '.'],
                    ['.', '.', '#', '.', '#', '.', '.', '.', '.', '.'],
                    ['.', '.', '.', '.', '.', '.', '.', '#', '.', '.'],
                    ['.', '.', '.', '.', '.', '.', '.', '.', '.', '.'],
                    ['.', '#', '.', '.', '^', '.', '.', '.', '.', '.'],
                    ['.', '.', '.', '.', '.', '.', '.', '.', '#', '.'],
                    ['#', '.', '.', '.', '.', '.', '.', '.', '.', '.'],
                    ['.', '.', '.', '.', '.', '.', '#', '.', '.', '.'],
                ],
                "row" => 3,
                "col" => 4,
            ],
        ];


        foreach ($rows as $key => $row) {
            $this::assertEquals($row["expected"], PatrolChecker::addObstacleToPosition(InputExtractor::transformInputIntoArray(InputExtractor::parseInputToRows(InputDay06::INPUT_TEST)), $row["row"], $row["col"]), "Assert " . $key + 1);
        }
    }
}
