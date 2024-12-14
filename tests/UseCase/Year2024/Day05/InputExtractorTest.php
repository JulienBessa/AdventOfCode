<?php

namespace App\Tests\UseCase\Year2024\Day05;

use App\Inputs\Year2024\Day05\InputDay05;
use App\UseCase\Year2024\Day05\InputExtractor;
use PHPUnit\Framework\TestCase;

final class InputExtractorTest extends TestCase
{
    public function testParseInputToRows(): void
    {
        $expected = [
            '47|53',
            '97|13',
            '97|61',
            '97|47',
            '75|29',
            '61|13',
            '75|53',
            '29|13',
            '97|29',
            '53|29',
            '61|53',
            '97|53',
            '61|29',
            '47|13',
            '75|47',
            '97|75',
            '47|61',
            '75|61',
            '47|29',
            '75|13',
            '53|13',
            '',
            '75,47,61,53,29',
            '97,61,53,29,13',
            '75,29,13',
            '75,97,47,61,53',
            '61,13,29',
            '97,13,75,29,47',
        ];

        $this::assertEquals($expected, InputExtractor::parseInputToRows(InputDay05::INPUT_TEST));
    }

    public function testGetPageOrderingRules(): void
    {
        $expected = [
            47 => [53, 13, 61, 29],
            97 => [13, 61, 47, 29, 53, 75],
            75 => [29, 53, 47, 61, 13],
            61 => [13, 53, 29],
            29 => [13],
            53 => [29, 13],
        ];

        $this::assertEquals($expected, InputExtractor::getPageOrderingRules(InputExtractor::parseInputToRows(InputDay05::INPUT_TEST)));
    }

    public function testGetPagesToProduce(): void
    {
        $expected = [
            [75, 47, 61, 53, 29],
            [97, 61, 53, 29, 13],
            [75, 29, 13],
            [75, 97, 47, 61, 53],
            [61, 13, 29],
            [97, 13, 75, 29, 47],
        ];

        $this::assertEquals($expected, InputExtractor::getPagesToProduce(InputExtractor::parseInputToRows(InputDay05::INPUT_TEST)));
    }
}
