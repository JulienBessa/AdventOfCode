<?php

namespace App\Tests\UseCase\Year2024\Day07;

use App\Enum\Year2024\Day07\Operator;
use App\UseCase\Year2024\Day07\ArrayDuplicator;
use PHPUnit\Framework\TestCase;

class ArrayDuplicatorTest extends TestCase
{
    public function testDuplicateIntOperatorArray(): void
    {
        $datas = [
            [
                'expected' => [Operator::ASTERISK, Operator::ASTERISK, Operator::ASTERISK],
                'data' => [Operator::ASTERISK, Operator::ASTERISK, Operator::ASTERISK],
            ],
            [
                'expected' => [Operator::PLUS, Operator::PLUS, Operator::PLUS, Operator::PLUS],
                'data' => [Operator::PLUS, Operator::PLUS, Operator::PLUS, Operator::PLUS],
            ],
        ];

        foreach ($datas as $key => $data) {
            $this::assertEquals($data['expected'], ArrayDuplicator::duplicateIntOperatorArray($data['data']), 'Assert : ' . $key);
        }
    }
}
