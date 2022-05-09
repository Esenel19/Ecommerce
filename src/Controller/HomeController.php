<?php

namespace App\Controller;



use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class HomeController extends AbstractController
{
    /**
    * @Route("/", name="home")
    */

     public function index()
     {
        return $this->render('index.html.twig', [
            'title' => 'Acceuil'
         ]);
    }


    /**
    * @Route("/mail", name="email")
    */
   public function sendMail(MailerInterface $mailer)
   {
      // ...

      $mail = (new TemplatedEmail())
      ->from('expediteur@demo.test')
      ->to('destinataire@demo.test')
      ->subject('Mon beau sujet')
      ->htmlTemplate('mail/template.html.twig')
   ;
   
   $mailer->send($mail);

      // ...
   }

        
}
   