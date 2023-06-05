<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EphemerideRepository;

#[Route('/consulter/meteo', name: 'app_consulter_meteo_')]
class ConsulterMeteoController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(EphemerideRepository $ephemerideRepository): Response
    {
        return $this->render('consulter_meteo/index.html.twig', [
            'ephemeride' => $ephemerideRepository->findBy([])
        ]);
    }
}
