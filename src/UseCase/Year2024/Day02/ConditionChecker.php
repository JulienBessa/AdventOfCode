<?php

namespace App\UseCase\Year2024\Day02;

final class ConditionChecker
{
    /**
     * @param array<int,int> $row
     */
    public static function hasLevelStable(array $row): bool
    {
        $hasLevelStable = false;

        $previousVal = -1;

        foreach ($row as $item) {
            if ($item === $previousVal) {
                $hasLevelStable = true;
            }

            $previousVal = $item;
        }

        return $hasLevelStable;
    }

    /**
     * @param array<int,int> $row
     */
    public static function hasLevelOnlyIncreasing(array $row): bool
    {
        $hasLevelOnlyIncreasing = true;

        $previousVal = -1;

        foreach ($row as $item) {
            if ($item < $previousVal) {
                $hasLevelOnlyIncreasing = false;
            }

            $previousVal = $item;
        }

        return $hasLevelOnlyIncreasing;
    }

    /**
     * @param array<int,int> $row
     */
    public static function hasLevelOnlyDecreasing(array $row): bool
    {
        $hasLevelOnlyDecreasing = true;

        $previousVal = 99999999999999;

        foreach ($row as $item) {
            if ($item > $previousVal) {
                $hasLevelOnlyDecreasing = false;
            }

            $previousVal = $item;
        }

        return $hasLevelOnlyDecreasing;
    }

    /**
     * @param array<int,int> $row
     */
    public static function hasDifferenceOnlyBetweenOneAndThree(array $row): bool
    {
        $hasDifferenceOnlyBetweenOneAndThree = true;

        $previousVal = -1;

        foreach ($row as $item) {
            if ($previousVal !== -1) {
                $difference = abs($item - $previousVal);

                if ($difference < 1 || $difference > 3) {
                    $hasDifferenceOnlyBetweenOneAndThree = false;
                }
            }

            $previousVal = $item;
        }

        return $hasDifferenceOnlyBetweenOneAndThree;
    }
}
