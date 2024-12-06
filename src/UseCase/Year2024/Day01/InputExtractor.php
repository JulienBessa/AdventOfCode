<?php

namespace App\UseCase\Year2024\Day01;

final class InputExtractor
{
    /**
     * @return array<string,array<int,int>>
     */
    public static function parseInputToArray(string $input): array
    {
        $return = [
            'firstCol' => [],
            'secondCol' => [],
        ];

        $rows = explode("\n", $input);

        foreach ($rows as $row) {
            $explodedRow = explode('   ', $row);

            $return['firstCol'][] = intval($explodedRow[0]);
            $return['secondCol'][] = intval($explodedRow[1]);
        }

        sort($return['firstCol']);
        sort($return['secondCol']);

        return $return;
    }
}
