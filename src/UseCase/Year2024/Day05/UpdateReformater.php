<?php

namespace App\UseCase\Year2024\Day05;

class UpdateReformater
{
    /**
     * @param array<int,array<int,int>> $pageOrderingRules
     * @param array<int,int> $input
     *
     * @return array<int,int>
     */
    public static function reorderRow(array $pageOrderingRules, array $input): array
    {
        $response = [];

        $datasNbAfter = [];

        for ($i = 0; $i < count($input); $i++) {
            $datasNbAfter[$input[$i]] = 0;
            for ($j = 0; $j < count($input); $j++) {
                if ($j !== $i) {
                    if (!array_key_exists($input[$i], $pageOrderingRules)) {
                        $datasNbAfter[$input[$i]] = 0;
                    } elseif (in_array($input[$j], $pageOrderingRules[$input[$i]])) {
                        $datasNbAfter[$input[$i]]++;
                    }
                }
            }
        }

        $datasNbAfterFlipped = array_flip($datasNbAfter);
        ksort($datasNbAfterFlipped);

        $response = array_reverse($datasNbAfterFlipped);

        return $response;
    }
}
