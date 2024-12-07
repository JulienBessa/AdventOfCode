<?php

namespace App\UseCase\Year2024\Day02;

final class InputExtractor
{
    /**
     * @return array<int,array<int,int>>
     */
    public static function parseInputToArray(string $input): array
    {
        $return = [];

        $rows = explode("\n", $input);

        foreach ($rows as $key => $row) {
            $explodedRow = explode(' ', $row);

            foreach ($explodedRow as $item) {
                $return[$key][] = intval($item);
            }
        }

        return $return;
    }
}
