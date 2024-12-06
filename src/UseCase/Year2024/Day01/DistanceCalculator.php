<?php

namespace App\UseCase\Year2024\Day01;

final class DistanceCalculator
{
    /**
     * @param array<string,array<int,int>> $input
     */
    public static function calculateDistance(array $input): int
    {
        $cpt = 0;

        for ($i=0; $i < count($input["firstCol"]); $i++) { 
            $cpt += (abs($input["firstCol"][$i] - $input["secondCol"][$i]));
        }

        return $cpt;
    }
}