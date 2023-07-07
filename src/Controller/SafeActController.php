<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/safeactenergie')]
class SafeActController extends AbstractController
{
    #[Route('/contact_us', name: 'app_safe_act_contact_us')]
    public function contact_us(): Response
    {
        return $this->render('safe_act/contact_us.html.twig');
    }
    #[Route('/homme', name: 'app_safeact_homme_page')]
    public  function homme_page():Response
    {
        return $this -> render('safe_act/homme.html.twig');
    }
    #[Route('/about', name: 'app_safeact_about')]
    public  function about_page():Response
    {
        return $this -> render('safe_act/about.html.twig');
    }

}
