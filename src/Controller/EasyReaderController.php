<?php

namespace App\Controller;

use App\Service\EasyReadableDateGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EasyReaderController extends AbstractController
{

    public function __construct(private EasyReadableDateGenerator $generatorService)
    {
        $this->generatorService = $generatorService;
    }

    /**
     * Index page
     *
     * @param Request $request
     * @return Response
     */
    #[Route('/', name: 'easy_readable_date')]
    public function index(Request $request): Response
    {
        $formattedDate = '';

        if ($request->isMethod('POST')) {
            $seconds = $request->get('seconds');
            if ($seconds !== null && is_numeric($seconds) && $seconds > 0) {
                $formattedDate = $this->generatorService->generateFromSeconds((int)$seconds);
            } else {
                $formattedDate = 'Invalid input. Please enter a positive integer.';
            }
        }

        return $this->render('easy_readable_date/index.html.twig', [
            'formattedDate' => $formattedDate,
        ]);
    }

}