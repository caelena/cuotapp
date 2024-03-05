<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[IsGranted('ROLE_USER')]
class FrontpageController extends AbstractController
{
    #[Route('/', name: 'frontpage')]
    public function index(): Response
    {
        //$this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('frontpage/index.html.twig');
    }
}