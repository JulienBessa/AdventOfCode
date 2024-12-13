<?php

namespace App\Controller;

use App\Inputs\Year2024\Day01\InputDay01;
use App\Inputs\Year2024\Day02\InputDay02;
use App\Inputs\Year2024\Day04\InputDay04;
use App\UseCase\Year2024\Day01\Day01Manager;
use App\UseCase\Year2024\Day02\Day02Manager;
use App\UseCase\Year2024\Day03\Day03Manager;
use App\UseCase\Year2024\Day04\Day04Manager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function indexAction(Day01Manager $day01Manager, Day02Manager $day02Manager, Day03Manager $day03Manager, Day04Manager $day04Manager): Response
    {
        $hasFileInputDay03 = file_get_contents('../src/Inputs/Year2024/Day03/inputDay03.txt', true) !== false;

        $fileInputDay03 = '';

        if ($hasFileInputDay03) {
            $fileInputDay03 = file_get_contents('../src/Inputs/Year2024/Day03/inputDay03.txt', true);
        }

        $listAll = [
            'Day 01 2024' => [
                'partOne' => $day01Manager->processPartOne(InputDay01::INPUT),
                'partTwo' => $day01Manager->processPartTwo(InputDay01::INPUT),
            ],
            'Day 02 2024' => [
                'partOne' => $day02Manager->processPartOne(InputDay02::INPUT),
                'partTwo' => $day02Manager->processPartTwo(InputDay02::INPUT),
            ],
            'Day 03 2024' => [
                'partOne' => $day03Manager->processPartOne((string) $fileInputDay03),
                'partTwo' => $day03Manager->processPartTwo((string) $fileInputDay03),
            ],
            'Day 04 2024' => [
                'partOne' => $day04Manager->processPartOne(InputDay04::INPUT),
                'partTwo' => $day04Manager->processPartTwo(InputDay04::INPUT),
            ],
        ];

        return $this->render('index.html.twig', [
            'listAll' => $listAll,
        ]);
    }
}
