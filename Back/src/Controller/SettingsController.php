<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Service\NotificationService;
use App\Service\MessageService;
use App\Service\SettingsService;

class SettingsController extends AbstractController
{
    /**
     * @Route("/settings", name="settings")
     */
    public function index(NotificationService $ns, MessageService $ms,
        AuthenticationUtils $authenticationUtils, SettingsService $settingsService): Response
    {
        return $this->render('settings/index.html.twig', [
            'title' => 'Settings',
            'notifications'=>$ns->allNotifications(),
            'setting'=>$settingsService->returnSettings($this->getDoctrine()->getRepository(User::class)->findOneBy(['email'=>$authenticationUtils->getLastUsername()])->getId()),
            'messages'=>$ms->allMessages($this->getDoctrine()->getRepository(User::class)->findOneBy(['email'=>$authenticationUtils->getLastUsername()])->getId()),
        ]);
    }
}
