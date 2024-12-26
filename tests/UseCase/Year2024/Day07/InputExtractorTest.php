<?php

namespace App\Tests\UseCase\Year2024\Day07;

use App\Inputs\Year2024\Day07\InputDay07;
use App\UseCase\Year2024\Day07\InputExtractor;
use PHPUnit\Framework\TestCase;

final class InputExtractorTest extends TestCase
{
    public function testParseInputToRows(): void
    {
        $expected = [
            '190: 10 19',
            '3267: 81 40 27',
            '83: 17 5',
            '156: 15 6',
            '7290: 6 8 6 15',
            '161011: 16 10 13',
            '192: 17 8 14',
            '21037: 9 7 18 13',
            '292: 11 6 16 20',
        ];

        $this::assertEquals($expected, InputExtractor::parseInputToRows(InputDay07::INPUT_TEST));
    }

    public function testParseResultFromRow(): void
    {
        $expected = [190, 3267, 83, 156, 7290, 161011, 192, 21037, 292];

        foreach (InputExtractor::parseInputToRows(InputDay07::INPUT_TEST) as $key => $item) {
            $this::assertEquals($expected[$key], InputExtractor::parseResultFromRow($item));
        }
    }

    public function testParseNumbersFromRow(): void
    {
        $expected = [
            [10, 19],
            [81, 40, 27],
            [17, 5],
            [15, 6],
            [6, 8, 6, 15],
            [16, 10, 13],
            [17, 8, 14],
            [9, 7, 18, 13],
            [11, 6, 16, 20],
        ];

        foreach (InputExtractor::parseInputToRows(InputDay07::INPUT_TEST) as $key => $item) {
            $this::assertEquals($expected[$key], InputExtractor::parseNumbersFromRow($item));
        }

        foreach (InputExtractor::parseInputToRows(InputDay07::INPUT) as $key => $item) {
            dump(count(InputExtractor::parseNumbersFromRow($item)));
        }
    }
}
