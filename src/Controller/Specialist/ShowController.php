<?php

namespace App\Controller\Specialist;

use App\Repository\SpecialistRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/psychologue/{id}', name: 'app_specialist_show')]
class ShowController extends AbstractController
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

        return $this->render('specialist/show.html.twig', [
            'specialist' => $specialist,
        ]);
    }
}
