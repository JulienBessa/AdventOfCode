<?php

namespace App\UseCase\Year2024\Day07;

class InputExtractor
{
    /**
     * @return array<int,string>
     */
    public static function parseInputToRows(string $input): array
    {
        return explode("\n", $input);
    }

    public static function parseResultFromRow(string $item): int
    {
        if (strpos($item, ':') === false) {
            return 0;
        }

        return intval(substr($item, 0, strpos($item, ':') + 1));
    }

    /**
     * @return array<int,int>
     */
    public static function parseNumbersFromRow(string $item): array
    {
        $numbers = [];

        if (strpos($item, ':') === false) {
            return $numbers;
        }
        
        foreach (explode(' ', substr($item, strpos($item, ':') + 2)) as $number) {
            $numbers[] = intval($number);
        }

        return $numbers;
    }
}
