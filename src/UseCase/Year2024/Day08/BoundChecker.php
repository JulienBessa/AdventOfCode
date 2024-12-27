<?php

namespace App\UseCase\Year2024\Day08;

class BoundChecker
{
    /**
     * @param array<int,array<int,string>> $fullInput
     * @param array<string,int> $coordinates
     */
    public static function isOutOfBound(array $fullInput, array $coordinates): bool
    {
        $maxRow = count($fullInput) - 1;
        $maxCol = count($fullInput[0]) - 1;

        return $coordinates['row'] < 0 || $coordinates['row'] > $maxRow || $coordinates['col'] < 0 || $coordinates['col'] > $maxCol;
    }
}
