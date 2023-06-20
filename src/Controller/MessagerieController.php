<?php

namespace App\Controller;

use App\Entity\Messagerie;
use App\Form\MessagerieType;
use App\Repository\MessagerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/messagerie', name: 'app_messagerie_')]
class MessagerieController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(MessagerieRepository $messagerieRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('messagerie/index.html.twig', [
            'messagerie' => $messagerieRepository->findAll(),
        ]);
    }

    #[Route('/send', name: 'send', methods: ['GET', 'POST'])]
    public function sendMessage(Request $request, MessagerieRepository $messagerieRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $message = new Messagerie();
        $form = $this->createForm(MessagerieType::class, $message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $messagerieRepository->save($message, true);

            return $this->redirectToRoute('app_messagerie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('messagerie/send.html.twig', [
            'message' => $message,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'details', methods: ['GET'])]
    public function detailsReceiveMessage(Messagerie $message): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('messagerie/details.html.twig', [
            'messagerie' => $message,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Messagerie $message, MessagerieRepository $messagerieRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        if ($this->isCsrfTokenValid('delete' . $message->getId(), $request->request->get('_token'))) {
            $messagerieRepository->remove($message, true);
        }

        return $this->redirectToRoute('app_messagerie_index', [], Response::HTTP_SEE_OTHER);
    }
}
