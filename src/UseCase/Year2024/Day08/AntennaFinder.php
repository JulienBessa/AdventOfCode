<?php

namespace App\UseCase\Year2024\Day08;

class AntennaFinder
{
    /**
     * @param array<int,array<int,string>> $input
     *
     * @return array<string,array<int,array<string,int>>>
     */
    public static function findAntennaCoordinates(array $input)
    {
        $antennas = [];

        for ($row = 0; $row < count($input); $row++) {
            for ($col = 0; $col < count($input[$row]); $col++) {
                if ($input[$row][$col] !== '.') {
                    if (!array_key_exists($input[$row][$col], $antennas)) {
                        $antennas[$input[$row][$col]] = [];
                    }

                    $antennas[$input[$row][$col]][] = ['row' => $row, 'col' => $col];
                }
            }
        }

        return $antennas;
    }
}
