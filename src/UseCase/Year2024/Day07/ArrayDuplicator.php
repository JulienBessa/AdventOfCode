<?php

namespace App\UseCase\Year2024\Day07;

use App\Enum\Year2024\Day07\Operator;

class ArrayDuplicator
{
    /**
     * @param array<int,Operator> $array
     *
     * @return array<int,Operator>
     */
    public static function duplicateIntOperatorArray(array $array): array
    {
        $response = [];

        for ($i = 0; $i < count($array); $i++) {
            $response[$i] = $array[$i];
        }

        return $response;
    }
}
