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
class DevController extends AbstractController
{
    /**
     * @Route("/dev", name="dev")
     */
    public function index(NotificationService $ns, MessageService $ms,AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('dev/index.html.twig', [
            'controller_name' => 'DevController',
            'titleDashboard'=> 'developers',
            'notifications'=>$ns->allNotifications(),
            'messages'=>$ms->allMessages($this->getDoctrine()->getRepository(User::class)->findOneBy(['email'=>$authenticationUtils->getLastUsername()])->getEmail())
        ]);
    }
}
