<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Loader\Configurator\mailer;
use Symfony\Component\Mailer\Mailer as MailerMailer;
use Symfony\Component\Mailer\MailerInterface;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function contact(
        Request $request,
        MailerInterface $mailer
    ): Response {
    
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
                /**
         * Traitement du formulaire
         * Si le formulaire est soumis et qu'il est valide
         * alors on récupère les données du formulaire
         * et on les envoie par mail (pour le test on "dump and die" )
        */ 

        if($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();

            $email = (new Email())
            ->from($data['email'])
            ->to('contact@bnb.fr')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject($data['subject'])
            ->text($data['message'])
            ->html('<p>Nouveau message de ' . $data['firstname'] . ' ' . $data['lastname'] . ' (' . $data['email'] . ') :<br>' . $data['message'] . '</p>');

        $mailer->send($email);

            
        }
        return $this->render('page/contact.html.twig', [
            'contactForm' => $form->createView()
        ]);
    }
}