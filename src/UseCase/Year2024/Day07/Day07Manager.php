<?php

namespace App\UseCase\Year2024\Day07;

use App\Enum\Year2024\Day07\Operator;
use App\Inputs\Year2024\Day07\InputDay07;
use App\UseCase\DayManagerInterface;

class Day07Manager implements DayManagerInterface
{
    public function processPartOne(string $input): int
    {
        $nb = 0;

        $rows = InputExtractor::parseInputToRows($input);

        $operators = OperatorGenerator::generateAllByNb(12);

        foreach ($rows as $row) {
            $isEgal = false;
            $result = InputExtractor::parseResultFromRow($row);
            $numbers = InputExtractor::parseNumbersFromRow($row);

            foreach ($operators[count($numbers) - 1] as $operator) {
                if ($isEgal) {
                    continue;
                }
                $total = $numbers[0];

                for ($i=1; $i < count($numbers); $i++) { 
                    if ($operator[$i - 1] === Operator::ASTERISK) {
                        $total = Calculator::multiply($total, $numbers[$i]);
                    } else {
                        $total = Calculator::add($total, $numbers[$i]);
                    }
                }

                if ($total === $result) {
                    $isEgal = true;
                }
            }

            if ($isEgal) {
                $nb += $result;
            }
        }

        return $nb;
    }

    public function processPartTwo(string $input): int
    {
        $nb = 0;

        $rows = InputExtractor::parseInputToRows($input);

        $operators = OperatorGenerator::generateAllByNb(12);

        foreach ($rows as $row) {
            $isEgal = false;
            $result = InputExtractor::parseResultFromRow($row);
            $numbers = InputExtractor::parseNumbersFromRow($row);

            foreach ($operators[count($numbers) - 1] as $operator) {
                if ($isEgal) {
                    break;
                }

                $total = $numbers[0];

                for ($i=1; $i < count($numbers); $i++) {
                    if ($operator[$i - 1] === Operator::ASTERISK) {
                        $total = Calculator::multiply($total, $numbers[$i]);
                    } else {
                        $total = Calculator::add($total, $numbers[$i]);
                    }

                    if ($total > $result) {
                        break;
                    }
                }

                if ($total === $result) {
                    $isEgal = true;
                }
            }

            if ($isEgal) {
                $nb += $result;
            } else {
                foreach ($operators['alter'][count($numbers) - 1] as $operator) {
                    if ($isEgal) {
                        break;
                    }

                    $total = $numbers[0];

                    for ($i=1; $i < count($numbers); $i++) { 
                        if ($operator[$i - 1] === Operator::ASTERISK) {
                            $total = Calculator::multiply($total, $numbers[$i]);
                        } elseif ($operator[$i - 1] === Operator::PLUS) {
                            $total = Calculator::add($total, $numbers[$i]);
                        } else {
                            $total = Calculator::concat($total, $numbers[$i]);
                        }

                        if ($total > $result) {
                            break;
                        }
                    }

                    if ($total === $result) {
                        $isEgal = true;
                    }
                }

                if ($isEgal) {
                    $nb += $result;
                }
            }
        }

        return $nb;
    }
}
