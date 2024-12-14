<?php

namespace App\UseCase\Year2024\Day04;

final class InputExtractor
{
    /**
     * @return array<int,string>
     */
    public static function parseInputToRows(string $input): array
    {
        return explode("\r\n", $input);
    }

    /**
     * @param array<int,string> $input
     *
     * @return array<int,string>
     */
    public static function parseVertical(array $input): array
    {
        $response = [];

        foreach ($input as $key => $item) {
            for ($i = 0; $i < strlen($item); $i++) {
                if ($key === 0) {
                    $response[$i] = substr($item, $i, 1);
                } else {
                    $response[$i] .= substr($item, $i, 1);
                }
            }
        }

        return $response;
    }

    /**
     * @param array<int,string> $input
     *
     * @return array<int,string>
     */
    public static function parseDiagonalFromNorthWestToSouthEast(array $input): array
    {
        $response = [];

        $maxLength = count($input);

        for ($row = 0; $row < $maxLength; $row++) {
            $first = '';
            $second = '';
            for ($col = 0; $col < $maxLength; $col++) {
                if ($row + $col < $maxLength) {
                    $first .= substr($input[$row + $col], $col, 1);

                    if ($row !== 0) {
                        $second .= substr($input[$col], $row + $col, 1);
                    }
                }
            }

            $response[] = $first;

            if ($second !== '') {
                $response[] = $second;
            }
        }

        return $response;
    }

    /**
     * @param array<int,string> $input
     *
     * @return array<int,string>
     */
    public static function parseDiagonalFromSouthWestToNorthEast(array $input): array
    {
        $response = [];

        $maxLength = count($input);

        $idx = 0;

        for ($row = $maxLength - 1; $row >= 0; $row--) {
            $first = '';
            $second = '';
            for ($col = 0; $col < $maxLength; $col++) {
                if ($row - $col > -1) {
                    $first .= substr($input[$row - $col], $col, 1);
                    if ($col + $idx < $maxLength && $col > 0 && $maxLength - 1 - $col < $maxLength) {
                        $second .= substr($input[$maxLength - $col], $col + $idx, 1);
                    }
                }
            }

            $idx++;

            $response[] = $first;

            if ($second !== '') {
                $response[] = $second;
            }
        }

        return $response;
    }

    /**
     * @return array<int,string>
     */
    public static function transformRowIntoArray(string $input): array
    {
        $array = [];

        for ($i = 0; $i < strlen($input); $i++) {
            $array[] = substr($input, $i, 1);
        }

        return $array;
    }
}
