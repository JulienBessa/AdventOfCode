<?php

namespace App\UseCase\Year2024\Day01;

final class SameNumberCalculator
{
    /**
     * @param array<string,array<int,int>> $input
     */
    public static function calculate(array $input): int
    {
        $cpt = 0;

        for ($i = 0; $i < count($input['firstCol']); ++$i) {
            $cpt += ($input['firstCol'][$i] * (in_array($input['firstCol'][$i], $input['secondCol'], true) ? array_count_values($input['secondCol'])[$input['firstCol'][$i]] : 0));
        }

        return $cpt;
    }
}
