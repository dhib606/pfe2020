<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController {

    /**
     * @Route("/service", name="service")
     */
    public function index() {
        return $this->render('services/index.html.twig');
    }

}
