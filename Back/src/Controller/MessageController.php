<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Service\NotificationService;
use App\Service\MessageService;

/**
 * @Route("/back")
 */
class MessageController extends AbstractController
{
    /**
     * @Route("/messages", name="messages")
     */
    public function index(NotificationService $ns, MessageService $ms,AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('message/index.html.twig', [
            'title' => 'Messages',
            'notifications'=>$ns->allNotifications(),
            'messages'=>$ms->allMessages($this->getDoctrine()->getRepository(User::class)->findOneBy(['email'=>$authenticationUtils->getLastUsername()])->getEmail())
        ]);
    }
    /**
     * @Route("/message/{id}", name="message_read")
     */
    public function read(NotificationService $ns, MessageService $ms,AuthenticationUtils $authenticationUtils, $id): Response
    {
        return $this->render('message/read.html.twig', [
            'title' => 'Message',
            'notifications'=>$ns->allNotifications(),
            'messages'=>$ms->allMessages($this->getDoctrine()->getRepository(User::class)->findOneBy(['email'=>$authenticationUtils->getLastUsername()])->getEmail()),
            'message'=>$ms->message($id)
        ]);
    }
}
