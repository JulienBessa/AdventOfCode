<?php

namespace App\Controller;

use App\Formatter\AdventOfCodeFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function indexAction(AdventOfCodeFormatter $adventOfCodeFormatter): Response
    {
        return $this->render('index.html.twig', [
            'listAll' => $adventOfCodeFormatter->formatAnswers(),
            'thanksReddit' => $adventOfCodeFormatter->formatHelpers(),
        ]);
    }

    #[Route('/help/{year}/{day}/{part}', name: 'helper', requirements: ['year' => '\d+', 'day' => '\d+', 'part' => '\d'])]
    public function helperAction(int $year, int $day, int $part): Response
    {
        $twigFile = 'help/' . $year . '/Day' . ($day < 10 ? '0' : '') . $day . '/part' . ($part === 2 ? 'Two' : 'One') . '.html.twig';

        return $this->render($twigFile);
    }
}
