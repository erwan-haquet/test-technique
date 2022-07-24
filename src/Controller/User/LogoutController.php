<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/deconnexion', name: 'app_logout', methods: ['GET'])]
class LogoutController extends AbstractController
{
    /**
     * @throws \LogicException
     */
    public function __invoke(): void
    {
        throw new \LogicException('Don\'t forget to activate logout in security.yaml');
    }
}
