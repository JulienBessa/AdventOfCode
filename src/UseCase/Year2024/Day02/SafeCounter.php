<?php

namespace App\UseCase\Year2024\Day02;

final class SafeCounter
{
    /**
     * @param array<int,array<int,int>> $input
     */
    public static function countSafe(array $input): int
    {
        $nbSafe = 0;

        foreach ($input as $row) {
            if (SafeChecker::isSafe($row)) {
                $nbSafe++;
            }
        }

        return $nbSafe;
    }

    /**
     * @param array<int,array<int,int>> $input
     */
    public static function countSafeWithMaximumOneRemoved(array $input): int
    {
        $nbSafe = 0;

        foreach ($input as $row) {
            if (SafeChecker::isSafe($row)) {
                $nbSafe++;
            } else {
                for ($i = 0; $i < count($row); $i++) {
                    $clonedRow = Duplicator::duplicateArray($row);
                    unset($clonedRow[$i]);

                    if (SafeChecker::isSafe($clonedRow)) {
                        $nbSafe++;
                        $i = count($row);
                    }
                }
            }
        }

        return $nbSafe;
    }
}
