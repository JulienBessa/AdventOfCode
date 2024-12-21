<?php

namespace App\UseCase\Year2024\Day06;

class InputExtractor
{
    /**
     * @return array<int,string>
     */
    public static function parseInputToRows(string $input): array
    {
        return explode("\n", $input);
    }

    /**
     * @param array<int,string>
     * 
     * @return array<int,array<int,string>>
     */
    public static function transformInputIntoArray(array $input): array
    {
        $array = [];

        foreach ($input as $key => $row) {
            for ($i = 0; $i < strlen($row); $i++) {
                $array[$key][] = substr($row, $i, 1);
            }
        }

        return $array;
    }
}
