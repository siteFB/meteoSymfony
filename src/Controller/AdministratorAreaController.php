<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin', name: 'app_administrator_area_')]
class AdministratorAreaController extends AbstractController
{
    #[Route('/', name: 'dashboard')]
    public function index(): Response
    {
        return $this->render('administrator_area/index.html.twig');
    }

    #[Route('/profiles', name: 'profiles')]
    public function profiles(): Response
    {
        return $this->render('administrator_area/profiles.html.twig');
    }

    #[Route('/crudmeteo', name: 'crudmeteo')]
    public function crudmeteo(): Response
    {
        return $this->render('administrator_area/crudmeteo.html.twig');
    }

    #[Route('/crudmeteo/add', name: 'crudmeteo_add')]
    public function crudmeteo_add(): Response
    {
        return $this->render('administrator_area/crudmeteo_add.html.twig');
    }

    #[Route('/crudmeteo/modifier', name: 'crudmeteo_modifier')]
    public function crudmeteo_modifier(): Response
    {
        return $this->render('administrator_area/crudmeteo_modifier.html.twig');
    }

    #[Route('/crudmeteo/delete', name: 'crudmeteo_delete')]
    public function crudmeteo_delete(): Response
    {
        return $this->render('administrator_area/crudmeteo_delete.html.twig');
    }
}
