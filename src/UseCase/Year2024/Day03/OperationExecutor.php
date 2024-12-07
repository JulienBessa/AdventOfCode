<?php

namespace App\UseCase\Year2024\Day03;

final class OperationExecutor
{
    /**
     * @param array<int,int> $input
     */
    public static function multiply(array $input): int
    {
        return $input[0] * $input[1];
    }

    /**
     * @param array<int,int> $input
     */
    public static function add(array $input): int
    {
        $answer = 0;

        foreach ($input as $value) {
            $answer += $value;
        }

        return $answer;
    }
}
