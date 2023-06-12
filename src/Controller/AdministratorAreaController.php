<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UsersRepository;
use App\Entity\Users;

#[Route('/admin', name: 'app_administrator_area_')]
class AdministratorAreaController extends AbstractController
{
    #[Route('/', name: 'dashboard')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('administrator_area/index.html.twig');
    }

    #[Route('/profiles', name: 'profiles')]
    public function profiles(UsersRepository $users): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('administrator_area/profiles.html.twig', [
            'users' => $users->findAll(),
        ]);
    }

    #[Route('/crudmeteo', name: 'crudmeteo')]
    public function crudmeteo(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('administrator_area/crudmeteo.html.twig');
    }

    #[Route('/crudmeteo/add', name: 'crudmeteo_add')]
    public function crudmeteo_add(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('administrator_area/crudmeteo_add.html.twig');
    }

    #[Route('/crudmeteo/modifier', name: 'crudmeteo_modifier')]
    public function crudmeteo_modifier(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('administrator_area/crudmeteo_modifier.html.twig');
    }

    #[Route('/crudmeteo/delete', name: 'crudmeteo_delete')]
    public function crudmeteo_delete(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('administrator_area/crudmeteo_delete.html.twig');
    }
}
