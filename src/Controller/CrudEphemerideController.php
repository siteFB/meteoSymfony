<?php

namespace App\Controller;

use App\Entity\Ephemeride;
use App\Form\EphemerideType;
use App\Repository\EphemerideRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/crud/ephemeride')]
class CrudEphemerideController extends AbstractController
{
    #[Route('/', name: 'app_crud_ephemeride_index', methods: ['GET'])]
    public function index(EphemerideRepository $ephemerideRepository): Response
    {
        return $this->render('crud_ephemeride/index.html.twig', [
            'ephemerides' => $ephemerideRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_crud_ephemeride_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EphemerideRepository $ephemerideRepository): Response
    {
        $ephemeride = new Ephemeride();
        $form = $this->createForm(EphemerideType::class, $ephemeride);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ephemerideRepository->save($ephemeride, true);

            return $this->redirectToRoute('app_crud_ephemeride_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('crud_ephemeride/new.html.twig', [
            'ephemeride' => $ephemeride,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_crud_ephemeride_show', methods: ['GET'])]
    public function show(Ephemeride $ephemeride): Response
    {
        return $this->render('crud_ephemeride/show.html.twig', [
            'ephemeride' => $ephemeride,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_crud_ephemeride_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ephemeride $ephemeride, EphemerideRepository $ephemerideRepository): Response
    {
        $form = $this->createForm(EphemerideType::class, $ephemeride);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ephemerideRepository->save($ephemeride, true);

            return $this->redirectToRoute('app_crud_ephemeride_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('crud_ephemeride/edit.html.twig', [
            'ephemeride' => $ephemeride,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_crud_ephemeride_delete', methods: ['POST'])]
    public function delete(Request $request, Ephemeride $ephemeride, EphemerideRepository $ephemerideRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ephemeride->getId(), $request->request->get('_token'))) {
            $ephemerideRepository->remove($ephemeride, true);
        }

        return $this->redirectToRoute('app_crud_ephemeride_index', [], Response::HTTP_SEE_OTHER);
    }
}
