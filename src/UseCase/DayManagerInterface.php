<?php

namespace App\UseCase;

interface DayManagerInterface
{
    public function processPartOne(string $input): mixed;

    public function processPartTwo(string $input): mixed;
}
