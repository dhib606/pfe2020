<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FrontpageController extends AbstractController
{
    /**
     * @Route("/frontpage", name="frontpage")
     */
    public function index()
    {
        return $this->render('frontpage/index.html.twig', [
            'controller_name' => 'FrontpageController',
        ]);
    }
}
