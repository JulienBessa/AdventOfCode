<?php

namespace App\Tests\UseCase\Year2024\Day07;

use App\UseCase\Year2024\Day07\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testAdd(): void
    {
        $datas = [
            [
                'expected' => 22,
                'firstNumber' => 17,
                'secondNumber' => 5,
            ],
            [
                'expected' => 66,
                'firstNumber' => 55,
                'secondNumber' => 11,
            ],
        ];

        foreach ($datas as $key => $item) {
            $this::assertEquals($item['expected'], Calculator::add($item['firstNumber'], $item['secondNumber']));
        }
    }

    public function testMultiply(): void
    {
        $datas = [
            [
                'expected' => 85,
                'firstNumber' => 17,
                'secondNumber' => 5,
            ],
            [
                'expected' => 605,
                'firstNumber' => 55,
                'secondNumber' => 11,
            ],
        ];

        foreach ($datas as $key => $item) {
            $this::assertEquals($item['expected'], Calculator::multiply($item['firstNumber'], $item['secondNumber']));
        }
    }

    public function testConcat(): void
    {
        $datas = [
            [
                'expected' => 175,
                'firstNumber' => 17,
                'secondNumber' => 5,
            ],
            [
                'expected' => 5511,
                'firstNumber' => 55,
                'secondNumber' => 11,
            ],
        ];

        foreach ($datas as $key => $item) {
            $this::assertEquals($item['expected'], Calculator::concat($item['firstNumber'], $item['secondNumber']));
        }
    }
}
