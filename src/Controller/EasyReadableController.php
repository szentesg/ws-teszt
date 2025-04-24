<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\SecondsType;
use App\Service\EasyReadableDateGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EasyReadableController extends AbstractController
{

    public function __construct(private EasyReadableDateGenerator $generatorService)
    {
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
        $form = $this->createForm(SecondsType::class);

		$form->handleRequest($request);
		$formattedDate = null;

		if ($form->isSubmitted() && $form->isValid()) {
			$data = $form->getData();
            $seconds = $data['seconds'];
            
            if ($seconds !== null && is_numeric($seconds)) {
                $formattedDate = $this->generatorService->generateFromSeconds((int)$seconds);
            } else {
                $formattedDate = 'Invalid input. Please enter a positive integer.';
            }
        }

        return $this->render('easy_readable_date/index.html.twig', [
            'form' => $form->createView(),
            'formattedDate' => $formattedDate,
        ]);
    }

}