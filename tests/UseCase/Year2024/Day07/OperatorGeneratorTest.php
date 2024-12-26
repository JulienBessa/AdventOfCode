<?php

namespace App\Tests\UseCase\Year2024\Day07;

use App\Enum\Year2024\Day07\Operator;
use App\UseCase\Year2024\Day07\OperatorGenerator;
use PHPUnit\Framework\TestCase;

class OperatorGeneratorTest extends TestCase
{
    public function testGenerateAll(): void
    {
        for ($nbOperators=1; $nbOperators < 12; $nbOperators++) { 
            $this->assertEquals(pow(2, $nbOperators), count(OperatorGenerator::generateAll($nbOperators)), 'Nb operator : ' . $nbOperators);
        }
    }

    public function testGenerateFullSameOperator(): void
    {
        $datas = [
            [
                'expected' => [Operator::ASTERISK, Operator::ASTERISK, Operator::ASTERISK],
                'nbOperators' => 3,
                'operator' => Operator::ASTERISK,
            ],
            [
                'expected' => [Operator::PLUS, Operator::PLUS, Operator::PLUS, Operator::PLUS],
                'nbOperators' => 4,
                'operator' => Operator::PLUS,
            ],
        ];
        
        foreach ($datas as $key => $data) {
            $this->assertEquals($data['expected'], OperatorGenerator::generateFullSameOperator($data['nbOperators'], $data['operator']), 'Assert : ' . $key);
        }
    }
}
