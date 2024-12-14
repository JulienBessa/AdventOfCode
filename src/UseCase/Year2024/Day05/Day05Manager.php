<?php

namespace App\UseCase\Year2024\Day05;

use App\UseCase\DayManagerInterface;

class Day05Manager implements DayManagerInterface
{
    public function processPartOne(string $input): mixed
    {
        $nb = 0;

        $arrayInput = InputExtractor::parseInputToRows($input);
        $pagesToProduce = InputExtractor::getPagesToProduce($arrayInput);
        $pageOrderingRules = InputExtractor::getPageOrderingRules($arrayInput);

        foreach ($pagesToProduce as $page) {
            if (UpdateChecker::isPagesBeforeOthers($pageOrderingRules, $page)) {
                $nb += UpdateChecker::getMiddleItem($page);
            }
        }

        return $nb;
    }

    public function processPartTwo(string $input): mixed
    {
        $nb = 0;

        $arrayInput = InputExtractor::parseInputToRows($input);
        $pagesToProduce = InputExtractor::getPagesToProduce($arrayInput);
        $pageOrderingRules = InputExtractor::getPageOrderingRules($arrayInput);

        foreach ($pagesToProduce as $page) {
            if (!UpdateChecker::isPagesBeforeOthers($pageOrderingRules, $page)) {
                $reordered = UpdateReformater::reorderRow($pageOrderingRules, $page);
                $nb += UpdateChecker::getMiddleItem($reordered);
            }
        }

        return $nb;
    }
}
