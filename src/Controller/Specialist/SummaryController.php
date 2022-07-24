<?php

namespace App\Controller\Specialist;

use App\Repository\SpecialistRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/psychologue/{id}', name: 'app_specialist_summary')]
class SummaryController extends AbstractController
{
    public function __invoke(
        SpecialistRepositoryInterface $specialistRepository,
        int                           $id
    ): Response
    {
        $specialist = $specialistRepository->findById($id);

        if (!$specialist) {
            throw $this->createNotFoundException('No specialist found for id ' . $id);
        }

        return $this->render('specialist/summary.html.twig', [
            'specialist' => $specialist,
        ]);
    }
}
