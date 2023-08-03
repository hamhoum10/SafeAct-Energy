<?php

namespace App\Controller;

use App\Entity\Mail;
use App\Form\Mail1Type;
use App\Form\MailType;
use Doctrine\DBAL\Types\TextType;
use Doctrine\ORM\EntityManagerInterface;
use http\Client\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;




#[Route('/safeactenergie')]
class SafeActController extends AbstractController
{

    public function sendEmail(MailerInterface $mailer,string $name,string $subject,string $message,string $email): void
    {
        $email = (new Email())
            ->from('omriyasser12@gmail.com')
            ->to('mohamedyasser.omri@esprit.tn')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject($subject)
            ->text('you have a mail from :'.$name.' who have a mail: '.$email.' saying '.$message);



         $mailer->send($email);;



    }

    #[Route('/contact_us', name: 'app_safe_act_contact_us')]
    public function contact_us(MailerInterface $mailer,\Symfony\Component\HttpFoundation\Request $request,EntityManagerInterface $entityManager): Response
    {
        $mail=new Mail();
        $form = $this->createForm(MailType::class,$mail);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())  {
          $name =$form->get('name')->getData();
            $email =$form->get('email')->getData();
            $subject =$form->get('subject')->getData();
            $message =$form->get('message')->getData();
//          $this->sendEmail($mailer,$name,$subject,$message,$email);






            return $this->render('safe_act/contact_us.html.twig',['form'=>$form->createView()]);
        }


        return $this->render('safe_act/contact_us.html.twig',['form'=>$form->createView()]);
    }
    #[Route('/homme', name: 'app_safeact_homme_page')]
    public  function homme_page():Response
    {
        return $this -> render('safe_act/homme.html.twig');
    }






}



