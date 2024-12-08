<?php

namespace App\UseCase\Year2024\Day04;

final class InputFinder
{
    public static function isXmasInString(string $input): bool
    {
        return (strpos($input, 'XMAS') !== false || strpos($input, 'SAMX') !== false);
    }

    public static function countXmasInString(string $input): int
    {
        $count = 0;

        if (InputFinder::isXmasInString($input)) {
            $count += substr_count($input, 'XMAS');
            $count += substr_count($input, 'SAMX');
        }

        return $count;
    }

    /**
     * @param array<int,string> $input
     */
    public static function countXmasInArray(array $input): int
    {
        $count = 0;

        foreach ($input as $row) {
            $count += InputFinder::countXmasInString($row);
        }

        return $count;
    }
}
