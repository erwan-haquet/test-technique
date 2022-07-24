<?php

namespace App\Controller;

use App\Repository\SpecialistRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_homepage')]
class HomepageController extends AbstractController
{
    public function __invoke(SpecialistRepositoryInterface $specialistRepository): Response
    {
        return $this->render('homepage/index.html.twig', [
            'specialists' => $specialistRepository->search(onlineFirst: true),
        ]);
    }
}
