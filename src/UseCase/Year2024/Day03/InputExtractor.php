<?php

namespace App\UseCase\Year2024\Day03;

final class InputExtractor
{
    /**
     * @return array<int,string|int>
     */
    public static function pregMatcher(string $pattern, string $input): array
    {
        preg_match_all($pattern, $input, $matches);
        
        return $matches[0];
    }

    /**
     * @return array<int,string>
     */
    public static function parseInputToMultArray(string $input): array
    {
        $pattern = '/mul\(\d+,\d+\)/';
        
        return InputExtractor::pregMatcher($pattern, $input);
    }

    /**
     * @return array<int,int>
     */
    public static function parseInputToOperators(string $input): array
    {
        $pattern = '/\d+/';
        
        return InputExtractor::pregMatcher($pattern, $input);
    }

    /**
     * @return array<int,string>
     */
    public static function parseInputToMultAndDoDontArray(string $input): array
    {
        $pattern = '/(mul\(\d+,\d+\))|(do\(\))|(don\'t\(\))/';
        
        return InputExtractor::pregMatcher($pattern, $input);
    }

    /**
     * @param array<int,string> $input
     * @return array<int,string>
     */
    public static function treatDoAndDont(array $input): array
    {
        $keep = true;

        $response = [];

        foreach ($input as $item) {
            if ($item === 'do()') {
                $keep = true;
            } else if ($item === "don't()") {
                $keep = false;
            } else if ($keep) {
                $response[] = $item;
            }
        }

        return $response;
    }
    
}
