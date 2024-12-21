<?php

namespace App\Formatter;

use App\Inputs\Year2024\Day01\InputDay01;
use App\Inputs\Year2024\Day02\InputDay02;
use App\Inputs\Year2024\Day04\InputDay04;
use App\Inputs\Year2024\Day05\InputDay05;
use App\Inputs\Year2024\Day06\InputDay06;
use App\UseCase\Year2024\Day01\Day01Manager;
use App\UseCase\Year2024\Day02\Day02Manager;
use App\UseCase\Year2024\Day03\Day03Manager;
use App\UseCase\Year2024\Day04\Day04Manager;
use App\UseCase\Year2024\Day05\Day05Manager;
use App\UseCase\Year2024\Day06\Day06Manager;

class AdventOfCodeFormatter
{
    private Day01Manager $day01Manager;
    private Day02Manager $day02Manager;
    private Day03Manager $day03Manager;
    private Day04Manager $day04Manager;
    private Day05Manager $day05Manager;
    private Day06Manager $day06Manager;

    public function __construct(Day01Manager $day01Manager, Day02Manager $day02Manager, Day03Manager $day03Manager, Day04Manager $day04Manager, Day05Manager $day05Manager, Day06Manager $day06Manager)
    {
        $this->day01Manager = $day01Manager;
        $this->day02Manager = $day02Manager;
        $this->day03Manager = $day03Manager;
        $this->day04Manager = $day04Manager;
        $this->day05Manager = $day05Manager;
        $this->day06Manager = $day06Manager;
    }

    /**
     * @return array<string,array<string,int|array<int,array<string,int>>>>
     */
    public function formatAnswers(): array
    {
        return array_merge(
            $this->formatAnswerDay01(),
            $this->formatAnswerDay02(),
            $this->formatAnswerDay03(),
            $this->formatAnswerDay04(),
            $this->formatAnswerDay05(),
            $this->formatAnswerDay06(),
        );
    }

    /**
     * @return array<string,array<string,array<string,int>>>
     */
    public function formatHelpers(): array
    {
        return array_merge(
            $this->formatHelperDay06(),
        );
    }

    /**
     * @return array<string,array<string,int>>
     */
    private function formatAnswerDay01(): array
    {
        return [
            'Day 01 2024' => [
                'partOne' => $this->day01Manager->processPartOne(InputDay01::INPUT),
                'partTwo' => $this->day01Manager->processPartTwo(InputDay01::INPUT),
            ],
        ];
    }

    /**
     * @return array<string,array<string,int>>
     */
    private function formatAnswerDay02(): array
    {
        return [
            'Day 02 2024' => [
                'partOne' => $this->day02Manager->processPartOne(InputDay02::INPUT),
                'partTwo' => $this->day02Manager->processPartTwo(InputDay02::INPUT),
            ],
        ];
    }

    /**
     * @return array<string,array<string,int>>
     */
    private function formatAnswerDay03(): array
    {
        $hasFileInputDay03 = file_get_contents('../src/Inputs/Year2024/Day03/inputDay03.txt', true) !== false;

        $fileInputDay03 = '';

        if ($hasFileInputDay03) {
            $fileInputDay03 = file_get_contents('../src/Inputs/Year2024/Day03/inputDay03.txt', true);
        }

        return [
            'Day 03 2024' => [
                'partOne' => $this->day03Manager->processPartOne((string) $fileInputDay03),
                'partTwo' => $this->day03Manager->processPartTwo((string) $fileInputDay03),
            ],
        ];
    }

    /**
     * @return array<string,array<string,int>>
     */
    private function formatAnswerDay04(): array
    {
        return [
            'Day 04 2024' => [
                'partOne' => $this->day04Manager->processPartOne(InputDay04::INPUT),
                'partTwo' => $this->day04Manager->processPartTwo(InputDay04::INPUT),
            ],
        ];
    }

    /**
     * @return array<string,array<string,int>>
     */
    private function formatAnswerDay05(): array
    {
        return [
            'Day 05 2024' => [
                'partOne' => $this->day05Manager->processPartOne(InputDay05::INPUT),
                'partTwo' => $this->day05Manager->processPartTwo(InputDay05::INPUT),
            ],
        ];
    }

    /**
     * @return array<string,array<string,int|array<int,array<string,int>>>>
     */
    private function formatAnswerDay06(): array
    {
        return [
            'Day 06 2024' => [
                'partOne' => $this->day06Manager->processPartOne(InputDay06::INPUT, false),
                // 'partTwo' => $this->day06Manager->processPartTwo(InputDay06::INPUT), //TOO LONG SO PUT ANSWER HERE
                'partTwo' => 1770,
            ],
        ];
    }

    /**
     * @return array<string,array<string,array<string,int>>>
     */
    private function formatHelperDay06(): array
    {
        return [
            'Day 06 2024' => [
                'partTwo' => [
                    'year' => 2024,
                    'day' => 6,
                    'part' => 2,
                ],
            ],
        ];
    }
}
