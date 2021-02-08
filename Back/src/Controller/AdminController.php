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
class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(NotificationService $ns, MessageService $ms, AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'notifications'=>$ns->allNotifications(),
            'messages'=>$ms->allMessages($this->getDoctrine()->getRepository(User::class)->findOneBy(['email'=>$authenticationUtils->getLastUsername()])->getEmail())
            ]);
    }
}
