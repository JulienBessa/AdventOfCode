<?php

namespace App\UseCase\Year2024\Day04;

use App\UseCase\DayManagerInterface;

final class Day04Manager implements DayManagerInterface
{
    public function processPartOne(string $input): mixed
    {
        $horizontal = InputExtractor::parseInputToRows($input);
        $vertical = InputExtractor::parseVertical($horizontal);
        $diagonalFromNorthWestToSouthEast = InputExtractor::parseDiagonalFromNorthWestToSouthEast($horizontal);
        $diagonalFromSouthWestToNorthEast = InputExtractor::parseDiagonalFromSouthWestToNorthEast($horizontal);

        return InputFinder::countXmasInArray($horizontal) + InputFinder::countXmasInArray($vertical) + InputFinder::countXmasInArray($diagonalFromNorthWestToSouthEast) + InputFinder::countXmasInArray($diagonalFromSouthWestToNorthEast);
    }

    public function processPartTwo(string $input): mixed
    {
        $nb = 0;
        $fullArray = [];
        $horizontal = InputExtractor::parseInputToRows($input);

        foreach ($horizontal as $row) {
            $fullArray[] = InputExtractor::transformRowIntoArray($row);
        }

        for ($rowId = 0; $rowId < count($horizontal) - 2; $rowId++) {
            for ($colId = 0; $colId < count($horizontal) - 2; $colId++) {
                if ($fullArray[$rowId][$colId] === 'M' && $fullArray[$rowId][$colId + 2] === 'S' && $fullArray[$rowId + 1][$colId + 1] === 'A' && $fullArray[$rowId + 2][$colId] === 'M' && $fullArray[$rowId + 2][$colId + 2] === 'S') {
                    $nb++;
                } elseif ($fullArray[$rowId][$colId] === 'S' && $fullArray[$rowId][$colId + 2] === 'M' && $fullArray[$rowId + 1][$colId + 1] === 'A' && $fullArray[$rowId + 2][$colId] === 'S' && $fullArray[$rowId + 2][$colId + 2] === 'M') {
                    $nb++;
                } elseif ($fullArray[$rowId][$colId] === 'M' && $fullArray[$rowId][$colId + 2] === 'M' && $fullArray[$rowId + 1][$colId + 1] === 'A' && $fullArray[$rowId + 2][$colId] === 'S' && $fullArray[$rowId + 2][$colId + 2] === 'S') {
                    $nb++;
                } elseif ($fullArray[$rowId][$colId] === 'S' && $fullArray[$rowId][$colId + 2] === 'S' && $fullArray[$rowId + 1][$colId + 1] === 'A' && $fullArray[$rowId + 2][$colId] === 'M' && $fullArray[$rowId + 2][$colId + 2] === 'M') {
                    $nb++;
                }
            }
        }

        return $nb;
    }
}
