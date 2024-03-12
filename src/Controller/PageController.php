<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PageController extends AbstractController
{
    // Page d'accueil de l'application
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('page/index.html.twig', [
            'title' => 'paris',
            'subtitle' => 'paris',
            'background' => 'paris'
        ]);
    }

    // Page d'accueil Las-Vegas
    #[Route('/las-vegas', name: 'las-vegas')]
    public function lasVegas(): Response
    {
        return $this->render('page/index.html.twig', [
            'title' => 'las-vegas',
            'subtitle' => 'las-vegas',
            'background' => 'lasvegas'
        ]);
    }
    // Page d'accueil Kyoto
    #[Route('/kyoto', name: 'kyoto')]
    public function kyoto(): Response
    {
        return $this->render('page/index.html.twig', [
            'title' => 'kyoto',
            'subtitle' => '京都市',
            'background' => 'kyoto'
        ]);
    }
    // Page d'accueil Hong Kong
    #[Route('/hong-kong', name: 'hong-kong')]
    public function hongKong(): Response
    {
        return $this->render('page/index.html.twig', [
            'title' => 'hong kong',
            'subtitle' => '香港',
            'background' => 'hongkong'
        ]);
    }

    // Page d'accueil Sydney
    #[Route('/sydney', name: 'sydney')]
    public function sydney(): Response
    {
        return $this->render('page/index.html.twig', [
            'title' => 'sydney',
            'subtitle' => 'sydney',
            'background' => 'sydney'
        ]);
    }

    // Page a propos de BnB
    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('page/about.html.twig', []);
    }

    // Page des offres de BnB
    #[Route('/offers', name: 'offers')]
    public function offers(): Response
    {
        return $this->render('page/offers.html.twig', []);
    }

    // Page des villes de BnB
    #[Route('/cities', name: 'cities')]
    public function cities(): Response
    {
        return $this->render('page/cities.html.twig', []);
    }

    // Page de contact de BnB
    

    // Page d'accueil de l'application
    #[Route('/profile', name: 'profile')]
    public function profile(): Response
    {
        return $this->render('page/profile.html.twig', []);
    }

    // Page de redirection après l'inscription et la confirmation de l'adresse mail
    #[Route('/after-register', name: 'after_register')]
    public function afterRegister(): Response
    {
        return $this->render('page/after-register.html.twig', []);
    }
}
