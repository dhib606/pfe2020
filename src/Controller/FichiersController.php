<?php

namespace App\Controller;

use App\Entity\Fichiers;
use App\Form\FichiersType;
use App\Repository\FichiersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fichiers")
 */
class FichiersController extends AbstractController
{
    /**
     * @Route("/", name="fichiers_index", methods={"GET"})
     */
    public function index(FichiersRepository $fichiersRepository): Response
    {
        return $this->render('fichiers/index.html.twig', [
            'fichiers' => $fichiersRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="fichiers_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fichier = new Fichiers();
        $form = $this->createForm(FichiersType::class, $fichier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fichier);
            $entityManager->flush();

            return $this->redirectToRoute('fichiers_index');
        }

        return $this->render('fichiers/new.html.twig', [
            'fichier' => $fichier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fichiers_show", methods={"GET"})
     */
    public function show(Fichiers $fichier): Response
    {
        return $this->render('fichiers/show.html.twig', [
            'fichier' => $fichier,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="fichiers_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fichiers $fichier): Response
    {
        $form = $this->createForm(FichiersType::class, $fichier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fichiers_index');
        }

        return $this->render('fichiers/edit.html.twig', [
            'fichier' => $fichier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="fichiers_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Fichiers $fichier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fichier->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fichier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fichiers_index');
    }
}
