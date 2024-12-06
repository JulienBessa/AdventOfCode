<?php

namespace App\UseCase\Year2024\Day01;

use App\UseCase\DayManagerInterface;

final class Day01Manager implements DayManagerInterface
{
    public function processPartOne(string $input): mixed
    {
        $parsedArray = InputExtractor::parseInputToArray($input);

        return DistanceCalculator::calculateDistance($parsedArray);
    }

    public function processPartTwo(string $input): mixed
    {
        $parsedArray = InputExtractor::parseInputToArray($input);

        return SameNumberCalculator::calculate($parsedArray);
    }
}