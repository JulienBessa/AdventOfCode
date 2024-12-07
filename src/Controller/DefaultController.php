<?php

namespace App\Controller;

use App\Inputs\Year2024\Day01\InputDay01;
use App\Inputs\Year2024\Day02\InputDay02;
use App\UseCase\Year2024\Day01\Day01Manager;
use App\UseCase\Year2024\Day02\Day02Manager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function indexAction(Day01Manager $day01Manager, Day02Manager $day02Manager): Response
    {
        $listAll = [
            'Day 01 2024' => [
                'partOne' => $day01Manager->processPartOne(InputDay01::INPUT),
                'partTwo' => $day01Manager->processPartTwo(InputDay01::INPUT),
            ],
            'Day 02 2024' => [
                'partOne' => $day02Manager->processPartOne(InputDay02::INPUT),
                'partTwo' => $day02Manager->processPartTwo(InputDay02::INPUT),
            ],
        ];

        return $this->render('index.html.twig', [
            'listAll' => $listAll
        ]);
    }
}
