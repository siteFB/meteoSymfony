<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/consulter/meteo', name: 'app_consulter_meteo_')]
class ConsulterMeteoController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('consulter_meteo/index.html.twig');
    }

    #[Route('/today', name: 'jour')]
    public function today(): Response
    {
        return $this->render('consulter_meteo/jour.html.twig');
    }

    #[Route('/week', name: 'semaine')]
    public function week(): Response
    {
        return $this->render('consulter_meteo/semaine.html.twig');
    }

    #[Route('/fifteen', name: 'quinzaine')]
    public function fifteen(): Response
    {
        return $this->render('consulter_meteo/quinzaine.html.twig');
    }
}
