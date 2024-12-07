<?php

namespace App\UseCase\Year2024\Day02;

final class SafeChecker
{
    /**
     * @param array<int,int> $row
     */
    public static function isSafe(array $row): bool
    {
        return (!ConditionChecker::hasLevelStable($row) && ConditionChecker::hasDifferenceOnlyBetweenOneAndThree($row) && (ConditionChecker::hasLevelOnlyDecreasing($row) || ConditionChecker::hasLevelOnlyIncreasing($row)));
    }
}
