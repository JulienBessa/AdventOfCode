<?php

namespace App\UseCase\Year2024\Day03;

use App\UseCase\DayManagerInterface;

final class Day03Manager implements DayManagerInterface
{
    public function processPartOne(string $input): mixed
    {
        $multArray = InputExtractor::parseInputToMultArray($input);

        $termArray = [];

        foreach ($multArray as $mult) {
            $operators = InputExtractor::parseInputToOperators($mult);

            $termArray[] = OperationExecutor::multiply($operators);
        }
        
        return OperationExecutor::add($termArray);
    }

    public function processPartTwo(string $input): mixed
    {
        $multDoDontArray = InputExtractor::parseInputToMultAndDoDontArray($input);

        $multArray = InputExtractor::treatDoAndDont($multDoDontArray);

        $termArray = [];

        foreach ($multArray as $mult) {
            $operators = InputExtractor::parseInputToOperators($mult);

            $termArray[] = OperationExecutor::multiply($operators);
        }
        
        return OperationExecutor::add($termArray);
    }
}
