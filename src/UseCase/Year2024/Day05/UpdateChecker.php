<?php

namespace App\UseCase\Year2024\Day05;

class UpdateChecker
{
    /**
     * @param array<int,int> $input
     */
    public static function getMiddleItem(array $input): int
    {
        return $input[floor(count($input) / 2)];
    }

    /**
     * @param array<int,array<int,int>> $pageOrderingRules
     * @param array<int,int> $input
     */
    public static function isPagesBeforeOthers(array $pageOrderingRules, array $input): bool
    {
        $isPagesBeforeOthers = true;

        for ($i = 0; $i < count($input) - 1; $i++) {
            $isOK = true;
            for ($j = $i + 1; $j < count($input); $j++) {
                if (!array_key_exists($input[$i], $pageOrderingRules) || !in_array($input[$j], $pageOrderingRules[$input[$i]], true)) {
                    $isOK = false;
                }
            }

            if (!$isOK) {
                $isPagesBeforeOthers = false;
            }
        }

        return $isPagesBeforeOthers;
    }
}
