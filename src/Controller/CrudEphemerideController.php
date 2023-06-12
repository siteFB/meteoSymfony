<?php

namespace App\Controller;

use App\Entity\Ephemeride;
use App\Form\EphemerideType;
use App\Repository\EphemerideRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/crud/ephemeride', name: 'admin/crud_ephemeride_')]
class CrudEphemerideController extends AbstractController
{

    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(EphemerideRepository $ephemerideRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('crud_ephemeride/index.html.twig', [
            'ephemerides' => $ephemerideRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EphemerideRepository $ephemerideRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $ephemeride = new Ephemeride();
        $form = $this->createForm(EphemerideType::class, $ephemeride);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ephemerideRepository->save($ephemeride, true);

            return $this->redirectToRoute('admin/crud_ephemeride_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('crud_ephemeride/new.html.twig', [
            'ephemeride' => $ephemeride,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Ephemeride $ephemeride): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('crud_ephemeride/show.html.twig', [
            'ephemeride' => $ephemeride,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ephemeride $ephemeride, EphemerideRepository $ephemerideRepository): Response
    {
        $this->denyAccessUnlessGranted('EPHEMERIDE_EDIT', $ephemeride);   //Security -> Voter -> EphemVot.php  "edit" réservé à un role (ici admin...) si erreur: ex: "EPHEMERIDE_EDI" ==> acceess denied!
        $form = $this->createForm(EphemerideType::class, $ephemeride);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ephemerideRepository->save($ephemeride, true);

            return $this->redirectToRoute('admin/crud_ephemeride_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('crud_ephemeride/edit.html.twig', [
            'ephemeride' => $ephemeride,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Ephemeride $ephemeride, EphemerideRepository $ephemerideRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        if ($this->isCsrfTokenValid('delete' . $ephemeride->getId(), $request->request->get('_token'))) {
            $ephemerideRepository->remove($ephemeride, true);
        }

        return $this->redirectToRoute('admin/crud_ephemeride_index', [], Response::HTTP_SEE_OTHER);
    }
}
