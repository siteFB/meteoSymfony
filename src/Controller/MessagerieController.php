<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/messagerie', name: 'app_messagerie_')]
class MessagerieController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('messagerie/index.html.twig');
    }

    #[Route('/send', name: 'sendMessage')]
    public function sendMessage(): Response
    {
        return $this->render('messagerie/sendMessage.html.twig');
    }

    #[Route('/detailsReceive', name: 'detailsReceiveMessage')]
    public function detailsReceiveMessage(): Response
    {
        return $this->render('messagerie/detailsReceiveMessage.html.twig');
    }

    #[Route('/delete', name: 'deleteMessage')]
    public function detailsDeleteMessage(): Response
    {
        return $this->render('messagerie/deleteMessage.html.twig');
    }
}
