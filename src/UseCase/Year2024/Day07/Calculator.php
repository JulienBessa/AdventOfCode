<?php

namespace App\UseCase\Year2024\Day07;

class Calculator
{
    public static function add(int $firstNumber, int $secondNumber): int
    {
        return $firstNumber + $secondNumber;
    }

    public static function multiply(int $firstNumber, int $secondNumber): int
    {
        return $firstNumber * $secondNumber;
    }

    public static function concat(int $firstNumber, int $secondNumber): int
    {
        return ($firstNumber * pow(10, floor(log10($secondNumber)) + 1)) + $secondNumber;
    }
}
