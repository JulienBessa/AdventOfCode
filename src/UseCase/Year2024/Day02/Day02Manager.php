<?php

namespace App\UseCase\Year2024\Day02;

use App\UseCase\DayManagerInterface;

final class Day02Manager implements DayManagerInterface
{
    public function processPartOne(string $input): int
    {
        $parsedArray = InputExtractor::parseInputToArray($input);

        return SafeCounter::countSafe($parsedArray);
    }

    public function processPartTwo(string $input): int
    {
        $parsedArray = InputExtractor::parseInputToArray($input);

        return SafeCounter::countSafeWithMaximumOneRemoved($parsedArray);
    }
}
