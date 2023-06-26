<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SafeActController extends AbstractController
{
    #[Route('/homme', name: 'app_safe_act')]
    public function index1(): Response
    {
        return $this->render('safe_act/index.html.twig');
    }
}
