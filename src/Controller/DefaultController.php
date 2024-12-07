<?php

namespace App\Controller;

use App\Inputs\Year2024\Day01\InputDay01;
use App\UseCase\Year2024\Day01\Day01Manager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function indexAction(Day01Manager $day01Manager): Response
    {
        $listAll = [
            'Day 01 2024' => [
                'partOne' => $day01Manager->processPartOne(InputDay01::INPUT),
                'partTwo' => $day01Manager->processPartTwo(InputDay01::INPUT),
            ],
        ];

        return $this->render('index.html.twig', [
            'listAll' => $listAll
        ]);
    }
}
