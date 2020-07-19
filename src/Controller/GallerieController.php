<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GallerieController extends AbstractController
{
    /**
     * @Route("/gallerie", name="gallerie")
     */
    public function index()
    {
        return $this->render('gallerie/index.html.twig', [
            'controller_name' => 'GallerieController',
        ]);
    }
}
