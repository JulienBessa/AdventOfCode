<?php

namespace App\UseCase\Year2024\Day08;

use App\Enum\Year2024\Day08\Operation;

class DistanceCalculator
{
    /**
     * @param array<string,int> $firstElem
     * @param array<string,int> $secondElem
     *
     * @return array<string,int>
     */
    public static function calculateDistance(array $firstElem, array $secondElem): array
    {
        return [
            'row' => abs($firstElem['row'] - $secondElem['row']),
            'col' => abs($firstElem['col'] - $secondElem['col']),
        ];
    }

    /**
     * @param array<string,int> $elem
     * @param array<string,int> $coordinates
     *
     * @return array<string,int>
     */
    public static function calculateAntinode(array $elem, array $coordinates, Operation $operationRow, Operation $operationCol): array
    {
        $return = [];

        if ($operationCol === Operation::ADD) {
            $return['col'] = $elem['col'] + $coordinates['col'];
        } else {
            $return['col'] = $elem['col'] - $coordinates['col'];
        }

        if ($operationRow === Operation::ADD) {
            $return['row'] = $elem['row'] + $coordinates['row'];
        } else {
            $return['row'] = $elem['row'] - $coordinates['row'];
        }

        return $return;
    }
}
