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

        return (InputFinder::countXmasInArray($horizontal) + InputFinder::countXmasInArray($vertical) + InputFinder::countXmasInArray($diagonalFromNorthWestToSouthEast) + InputFinder::countXmasInArray($diagonalFromSouthWestToNorthEast));
    }

    public function processPartTwo(string $input): mixed
    {
        $horizontal = InputExtractor::parseInputToRows($input);
        $vertical = InputExtractor::parseVertical($horizontal);
        $diagonalFromNorthWestToSouthEast = InputExtractor::parseDiagonalFromNorthWestToSouthEast($horizontal);
        $diagonalFromSouthWestToNorthEast = InputExtractor::parseDiagonalFromSouthWestToNorthEast($horizontal);

        return (InputFinder::countXmasInArray($horizontal) + InputFinder::countXmasInArray($vertical) + InputFinder::countXmasInArray($diagonalFromNorthWestToSouthEast) + InputFinder::countXmasInArray($diagonalFromSouthWestToNorthEast));
    }
}
