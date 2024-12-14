<?php

namespace App\UseCase\Year2024\Day05;

final class InputExtractor
{
    /**
     * @return array<int,string>
     */
    public static function parseInputToRows(string $input): array
    {
        return explode("\n", $input);
    }

    /**
     * @param array<int,string> $input
     *
     * @return array<string,array<int,int>>
     */
    public static function getPageOrderingRules(array $input): array
    {
        $datas = [];

        foreach ($input as $row) {
            if (strpos($row, '|') !== false) {
                $exploded = explode('|', $row);

                $datas[intval($exploded[0])][] = intval($exploded[1]);
            }
        }

        return $datas;
    }

    /**
     * @param array<int,string> $input
     *
     * @return array<int,array<int,int>>
     */
    public static function getPagesToProduce(array $input): array
    {
        $datas = [];

        foreach ($input as $row) {
            if (strpos($row, ',') !== false) {
                $datas[] = explode(',', $row);
            }
        }

        return $datas;
    }
}
