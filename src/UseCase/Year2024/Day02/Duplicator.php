<?php

namespace App\UseCase\Year2024\Day02;

final class Duplicator
{
    /**
     * @param array<int,int> $input
     * @return array<int,int> $input
     */
    public static function duplicateArray(array $input): array
    {
        $output = [];

        foreach ($input as $key => $value) {
            $output[$key] = $value;
        }

        return $output;
    }
}
