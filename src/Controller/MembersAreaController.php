<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/members', name: 'app_members_area_')]
class MembersAreaController extends AbstractController
{
    #[Route('', name: 'dashbordMembre')]
    public function index(): Response
    {
        return $this->render('members_area/index.html.twig');
    }

    #[Route('profil_membre', name: 'profilMembre')]
    public function profilMembre(): Response
    {
        return $this->render('members_area/profil_membre.html.twig');
    }
}
